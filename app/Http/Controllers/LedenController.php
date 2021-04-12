<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LedenController extends Controller
{
    public function index()
    {
        //change members to members only atttached to account
        $user = User::with('members')->find(auth()->id());

        return inertia('Leden/Index', [
            'user' => $user,
        ]);
    }

    public function searchMembers(Request $request) {
        if ($request->keyword) {
            $filteredmembers = Member::select('id','username', 'firstname', 'tussenvoegsel', 'lastname')->where('firstname', 'LIKE', '%'.$request->keyword.'%')
                ->orWhere('lastname', 'LIKE', '%'.$request->keyword.'%')
                ->orWhere('email', 'LIKE', '%'.$request->keyword.'%')
                ->get();
            return $filteredmembers;
        } else {
            return null;
        }
    }

    public function show($username)
    {
        $member = Member::with('groups')->where('username',$username)->first();
        return inertia('Leden/Show', [
            'member' => $member,
        ]);
    }

    public function update(UpdateMemberRequest $request)
    {
        Member::find($request->input('id'))->update($request->validated());
        return redirect()->route('leden.show', $request->input('username'));
    }

    public function store(CreateMemberRequest $request)
    {
        Member::create($request->validated());
        return redirect()->back()->with('message', 'Lid succesvol aangemaakt');
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Member::find($request->input('id'))->delete();
            return redirect()->route('leden.index');
        }
    }

    public function coupleUser(Request $request) {
        //couple member_user
        $member = Member::find($request->input('id'));
        $user = Auth::user();
        $member->users()->attach($user);
        return redirect()->route('leden.index')->with('message', 'Koppeling aangevraagd');
    }

    public function decoupleUser(Request $request) {
        $member = Member::find($request->input('id'));
        $user = Auth::user();
        $member->users()->detach($user);
        return redirect()->route('leden.index')->with('message', 'Lid ontkoppeld');
    }

    public function addMemberToGroup(Request $request) {
        //couple member_group
        $group = Group::find($request->input('groupID'));
        $member = Member::find($request->input('memberID'));
        $group->members()->attach($member);
        return redirect()->back()->with('message', 'Groep gekoppeld');
    }

    public function removeMemberFromGroup(Request $request) {
        //decouple member_group
        $group = Group::find($request->input('groupID'));
        $member = Member::find($request->input('memberID'));
        $group->members()->detach($member);
        return redirect()->back()->with('message', 'Groep ontkoppeld');
    }
}

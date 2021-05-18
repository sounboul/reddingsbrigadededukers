<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $members = Member::get();
        $users = User::with(['members','requestedMembers'])->get();
        $categories = Category::get();
        return inertia('Admin/Index', [
            'users' => $users,
            'members' => $members,
            'categories' => $categories,
        ]);
    }

    public function confirmCouple(Request $request) {
        $user = User::find($request->input('userID'));
        $member = Member::find($request->input('memberID'));
        $user->members()->updateExistingPivot($request->input('memberID'), ['is_confirmed' => true]);
        //$user->members()->updateExistingPivot($member, ['is_confirmed' => 1]);
        return redirect()->back();
    }

    public function unconfirmCouple(Request $request) {
        $user = User::find($request->input('userID'));
        $member = Member::find($request->input('memberID'));

        $user->members()->updateExistingPivot($member, ['is_confirmed' => 0]);
        return redirect()->back();
    }

    public function activateUser(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_active = true;
        $user->save();
        return redirect()->back();
    }

    public function deactivateUser(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_active = false;
        $user->save();
        return redirect()->back();
    }

    public function makeAdmin(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_admin = true;
        $user->save();
        return redirect()->back();
    }

    public function delAdmin(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_admin = false;
        $user->save();
        return redirect()->back();
    }

    public function makeInstructor(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_instructor = true;
        $user->save();
        return redirect()->back();
    }

    public function delInstructor(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_instructor = false;
        $user->save();
        return redirect()->back();
    }

    public function makeEditor(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_groupeditor = true;
        $user->save();
        return redirect()->back();
    }

    public function delEditor(Request $request) {
        $user = User::find($request->input('userID'));
        $user->is_groupeditor = false;
        $user->save();
        return redirect()->back();
    }

    public function activateMember(Request $request) {
        $member = Member::find($request->input('memberID'));
        $member->active = true;
        $member->save();
        return redirect()->back();
    }

    public function deactivateMember(Request $request) {
        $member = Member::find($request->input('memberID'));
        $member->active = false;
        $member->save();
        return redirect()->back();
    }
}

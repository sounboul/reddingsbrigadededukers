<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $members = Member::get();
        $users = User::with('members')->get();

        return inertia('Admin/Index', [
            'users' => $users,
            'members' => $members,
        ]);
    }

    public function confirmCouple(Request $request) {
        $user = User::find($request->input('userID'));
        $member = Member::find($request->input('memberID'));

        $user->members()->updateExistingPivot($member, ['is_confirmed' => 1]);
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
}

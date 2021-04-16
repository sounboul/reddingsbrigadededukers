<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username) {
        $user = User::with('members')->where('username', $username)->first();
        return inertia('Users/Show', [
            'user' => $user,
        ]);

    }
}

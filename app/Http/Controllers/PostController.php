<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(CreatePostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->back()->with('message', 'Bericht succesvol aangemaakt');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->back()->with('message', 'Bericht succesvol aangemaakt');
    }
}

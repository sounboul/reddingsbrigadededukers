<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VerenigingController extends Controller
{
    public function index()
    {
        return Inertia::render('Vereniging');
    }
}

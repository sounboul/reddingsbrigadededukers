<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function sendMail(SendMailRequest $request)
    {
        //$title = 'Test email';
        Mail::to('harmjanbeekhuis@gmail.com')->send(new ContactMail($request));

        return response()->json(['message' => 'Email is verzonden']);


    }
}

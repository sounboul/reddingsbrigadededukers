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

        Mail::to('harmjanbeekhuis@gmail.com')->send(new ContactMail($request));

        return redirect()->back()->with(['success' => 'Email is verzonden']);


    }
}

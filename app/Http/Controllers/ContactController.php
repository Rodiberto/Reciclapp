<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendContactEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage = (object) $request->only('name', 'email', 'subject', 'message');

        Mail::to('info.reciclapp@gmail.com')->send(new ContactMail($contactMessage));
        

        return redirect()->back()->with('success', 'Tu mensaje ha sido enviado correctamente.');

    }
}

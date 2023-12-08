<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function test_view() 
    {
        return view('email.contact_mail');
    }

    public function post_message(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('tugas.smtplib@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', 'Pesan Berhasil Terkirim!');
    }
}

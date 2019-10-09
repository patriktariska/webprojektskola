<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class PagesController extends Controller
{
    // About Page //
    public function getAbout()
    {
        return view('public.pages.about');
    }
    // Connect Page //
    public function getConnect()
    {
        return view('public.pages.connect');
    }

    // Contact Page //
    public function getContact()
    {
        return view('public.pages.contact');
    }

    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'min:5'
        ], [
                'subject.required' => 'Subjekt správy je povinný.',
                'email.required' => 'Email je povinný.',
                'message.min' => 'Správa je príliž krátka.'
            ]
        );

        $data = array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        Mail::send('public.models.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('zigo@gmail.com');
            $message->subject($data['subject']);
        });

        return redirect()->back()
            ->with('success', 'Vaša správa bola úspešne odoslaná.');
    }

}

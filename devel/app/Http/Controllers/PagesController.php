<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Student;
use App\Feedback;
use Image;


class PagesController extends Controller
{
    // Index Page //
    public function getIndex(){
        $feedback = Feedback::with('Student')->get();
        //return response()->json($feedback);
        return view('public.pages.index', compact('feedback'));
    }

    // About Page //
    public function getAbout()
    {
        return view('public.pages.about');
    }

    // Feedback Page //
    public function getFeedback()
    {
        return view('public.pages.feedback');
    }

    public function sendFeedback(Request $request){
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'program' => 'required',
            'rate' => 'required',
            'email' => 'required|email',
            'comment' => 'min:5'
        ], [
                'subject.required' => 'Subjekt správy je povinný.',
                'email.required' => 'Email je povinný.',
                'message.min' => 'Správa je príliž krátka.'
            ]
        );
        $student = new Student();
            $student->fname = $request->fname;
            $student->lname = $request->lname;
            $student->email = $request->email;
            $student->save();

            $feedback = new Feedback();
            $image = $request->file('myFile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->
            save(public_path('/feedback/' . $filename));

            $feedback->photo = $filename;
            $feedback->comment = $request->message;
            $feedback->rate = $request->rate;
            $feedback->student_id = $student->id;
            $feedback->save();

        return view('public.pages.feedback');
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

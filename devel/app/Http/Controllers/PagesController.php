<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;
use Mail;
use App\Student;
use App\Feedback;
use Image;
use Auth;


class PagesController extends Controller
{
    // Index Page //
    public function getIndex(){
        $newChallenges = Challenge::with('School')->orderBy('created_at', 'desc')->take(3)->get();
        $challenges = Challenge::with('School')->orderBy('end', 'asc')->take(6)->get();
        $feedback = Feedback::with('Student')->where('published', true)->get();
        //return response()->json($feedback);
        return view('public.pages.index', compact('feedback', 'newChallenges', 'challenges'));
    }

    // About Page //
    public function getAbout()
    {
        return view('public.pages.about');
    }

    // Mobility Page //
    public function getChallenge($id){
        $getChallenge = Challenge::with('School')->where('id' , $id)->first();
        return view('public.pages.extension.mobility.show', compact('getChallenge'));
    }

    public function getAllChallenges(){
        $getChallenges = Challenge::get();
        return view('public.pages.extension.mobility.challenges', compact('getChallenges'));
    }

    // Feedback Page //
    public function getFeedback()
    {
        $getChallenge = Challenge::with('School')->get();
        return view('public.pages.feedback', compact('getChallenge'));
    }
    public function getMyFeedback()
    {
        if(Auth::user()){
            $feedback = Feedback::where('user_id', Auth::user()->id)->latest()->paginate(6);
            return view('public.pages.myfeedback', compact('feedback'));
        }
        return view('public.pages.myfeedback');
    }

    public function sendFeedback(Request $request){
        $this->validate($request, [
            'challenge_id' => 'required',
            'comment' => 'min:5',
            'rate' => 'required'
        ], [
                'challenge_id.required' => 'Program je povinný.',
                'comment.min' => 'Váš feedback je priliž krátky',
                'rate.required' => 'Hodnotenie je povinné pole.'
            ]
        );

            $feedback = new Feedback();
            $image = $request->file('myFile');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->
            save(public_path('/feedback/' . $filename));

            $feedback->photo = $filename;
            $feedback->comment = $request->input('comment');
            $feedback->rate = $request->input('rate');
            $feedback->user_id = $request->input('user_id');
            $feedback->challenge_id = $request->input('challenge_id');
            $feedback->save();

        return redirect()->back()
            ->with('success', 'Vaša správa bola úspešne odoslaná.');
    }

    public function editMyFeedback($id){
        $myfeed = Feedback::where('id', $id)->first();

        return view('public.pages.extension.myfeedback.edit', compact('myfeed'));
    }

    public function updateMyFeedback(Request $request){
        $this->validate($request, [
            'comment' => 'min:5',
            'rate' => 'required'
        ], [
                'comment.min' => 'Váš feedback je priliž krátky',
                'rate.required' => 'Hodnotenie je povinné pole.'
            ]
        );

        $myfeed = Feedback::findOrFail($request->id);
        $myfeed->comment = $request->input('comment');
        $myfeed->rate = $request->input('rate');
        $myfeed->save();

        return redirect()->route('myfeedback')
            ->with('success', 'Vaša feedback bol upravený.');
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

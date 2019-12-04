<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Feedback::with('Student')->get())
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" 
                    data-id="' . $row->id . '" class="btn btn-xs btn-warning showItem">
                    <i class="fa fa-edit"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Delete" id="delete-feedback"
                      class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        LogActivity::addToLog('Feedback index');
        return view('admin.pages.feedback');
    }

    public function show(Feedback $feedback)
    {
        $getFeedback = Feedback::where('id', '=', $feedback->id)->with('Student', 'Challenge')->first();

        LogActivity::addToLog('Zobrazenie detailu feedbacku');
        return view('admin.pages.extension.feedback.show', compact('getFeedback'));
    }

    public function update(Request $request)
    {
        if($request->input('published') == true){
            $feedback = Feedback::findOrFail($request->input('id'));
            $feedback->published = true;
            $feedback->save();

         }else{
            $feedback = Feedback::findOrFail($request->input('id'));
            $feedback->published = false;
            $feedback->save();
        }

        LogActivity::addToLog('Úprava status feedbacku');
        return redirect()->route('feedback.index')->with('success', 'Úspešne zmenený status feedbacku.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::where('id', $id)->delete();

        LogActivity::addToLog('Zmazanie feedbacku');
        return response ()->json ($feedback);
    }
}

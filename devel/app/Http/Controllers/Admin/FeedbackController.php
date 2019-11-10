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
                     data-id="' . $row->id . '" data-original-title="Edit" 
                     class="edit btn btn-xs btn-warning edit-feedback"><i class="fa fa-edit"></i></a>';

                    $btn = $btn. ' <a href="javascript:void(0)" data-toggle="tooltip" 
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

    public function edit($id)
    {
        $where = array('id' => $id);
        $feedback = Feedback::where($where)->first();

        return response()->json($feedback);
    }

    public function update(Request $request)
    {
        $feedbackId= $request->feedback_id;
        $feedback = Feedback::updateOrCreate(

            ['id' => $feedbackId],
            [
               'published' => $request->input('published')
            ]);

        LogActivity::addToLog('Úprava status feedbacku');
        return response()->json($feedback);
    }

    public function destroy($id)
    {
        $feedback = Feedback::where('id', $id)->delete();

        LogActivity::addToLog('Zmazanie feedbacku');
        return response ()->json ($feedback);
    }
}

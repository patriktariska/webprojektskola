<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\User;
use App\Challenge;


class StudentController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::has('Challenge')->with('Challenge')->get())
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Delete" id="delete-feedback"
                      class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        LogActivity::addToLog('Študenti index');
        return view('admin.pages.studentchallenge');
 
        /* $chal = User::has('Challenge')->with('Challenge')->orderBy('created_at', 'desc')->get();
        return response()->json($chal); */
    }

}
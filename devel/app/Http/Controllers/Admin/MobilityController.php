<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Helpers\LogActivity;
use App\Mobility;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class MobilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Mobility::with('School')->get())
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" 
                    data-id="' . $row->id . '" class="btn btn-xs btn-primary showItem">
                    <i class="fa fa-info-circle"></i></a>';
                    $btn2 = '<a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Edit" 
                     class="edit btn btn-xs btn-warning edit-mobility"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . ' ' . $btn2 . ' <a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Delete" id="delete-mobility"
                      class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        LogActivity::addToLog('Mobility index');
        return view('admin.pages.mobility');
    }

    public function create()
    {
        $school = School::get();
        return view('admin.pages.extension.mobility.create', compact('school'));
    }

    public function store(Request $request)
    {
        $mobility = new Mobility();
        $image = $request->file('myFile');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, 500)->
        save(public_path('/admin/mobility/' . $filename));
        $mobility->title_photo = $filename;

        $mobility->school_id = $request->input('school_id');
        $mobility->name = $request->input('name');
        $mobility->type = $request->input('type');
        $mobility->capacity = $request->input('capacity');
        $mobility->description = $request->input('description');
        $mobility->start = $request->input('start');
        $mobility->end = $request->input('end');
        $mobility->save();

        LogActivity::addToLog('Pridanie novej mobility');
        return redirect()->route('mobility.index')->with('Success', 'Úspešne zaevidovaná mobilita');
    }

    public function show(Mobility $mobility)
    {
        $getMobilities = Mobility::where('id', '=', $mobility->id)->with('School')->first();
        $getFeedback = Feedback::where('mobility_id', '=', $mobility->id)->with('Student')->get();

        LogActivity::addToLog('Zobrazenie detailu mobility');
        return view('admin.pages.extension.mobility.show', compact('getMobilities', 'getFeedback'));
    }

    public function edit(Mobility $mobility)
    {
        $selectedID = $mobility->id;
        $getMobility = Mobility::where('id', $mobility->id)->first();
        $school = School::get();

        return view('admin.pages.extension.mobility.edit', compact('getMobility', 'school', 'selectedID'));
    }

    public function update(Request $request, $id)
    {
        LogActivity::addToLog('Úprava mobility');

    }

    public function destroy($id)
    {
        $mobility = Mobility::where('id', $id)->delete();

        LogActivity::addToLog('Zmazanie mobility');
        return response()->json($mobility);
    }
}

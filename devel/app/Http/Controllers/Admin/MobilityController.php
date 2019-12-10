<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Helpers\LogActivity;
use App\Challenge;
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
            return datatables()->of(Challenge::with('Mobility', 'School')->get())
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
        $mobility = Mobility::get();

        return view('admin.pages.extension.mobility.create', compact('school', 'mobility'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mobility_id' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required'
        ], [
                'mobility_id.required' => 'Program je povinný.',
                'name.required' => 'Meno výzvy je povinné.',
                'capacity.required' => 'Kapacita je povinná.',
                'description.required' => 'Popis je povinný.',
                'start.required' => 'Začiatočný dátum je povinný',
                'end.required' => 'Ukončenie je povinné'
            ]
        );

        $mobility = new Challenge();
        $image = $request->file('myFile');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, 500)->
        save(public_path('/admin/mobility/' . $filename));
        $mobility->title_photo = $filename;

        $mobility->mobility_id = $request->input('mobility_id');
        $mobility->name = $request->input('name');
        $mobility->capacity = $request->input('capacity');
        $mobility->description = $request->input('description');
        $mobility->start = $request->input('start');
        $mobility->end = $request->input('end');
        $mobility->save();

        foreach ($request->school_id as $type) {
            $mobility->School()->attach($type);
        }

        LogActivity::addToLog('Pridanie novej mobility');
        return redirect()->route('mobility.index')->with('Success', 'Úspešne zaevidovaná mobilita');
    }

    public function show(Challenge $mobility)
    {
        $getMobilities = Challenge::where('id', '=', $mobility->id)->with('School')->first();
        $getFeedback = Feedback::where('challenge_id', '=', $mobility->id)->with('Student')->get();

        LogActivity::addToLog('Zobrazenie detailu mobility');
        return view('admin.pages.extension.mobility.show', compact('getMobilities', 'getFeedback'));
    }

    public function edit(Challenge $mobility)
    {
        $selectedID = $mobility->id;
        $getMobility = Mobility::get();
        $getChallenge = Challenge::with('Mobility')->where('id', $mobility->id)->first();
        $school = School::get();

        return view('admin.pages.extension.mobility.edit', compact('getChallenge', 'getMobility', 'school', 'selectedID'));
    }

    public function update(Request $request, $id)
    {
        $mobility = Challenge::findOrFail($request->input('id'));

        $image = $request->file('myFile');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, 500)->
        save(public_path('/admin/mobility/' . $filename));
        $mobility->title_photo = $filename;

        $mobility->mobility_id = $request->input('mobility_id');
        $mobility->name = $request->input('name');
        $mobility->capacity = $request->input('capacity');
        $mobility->description = $request->input('description');
        $mobility->start = $request->input('start');
        $mobility->end = $request->input('end');
        $mobility->save();

        foreach ($request->school_id as $type) {
            $mobility->School()->attach($type);
        }

        LogActivity::addToLog('Úprava mobility');
        return redirect()->route('mobility.index')->with('Success', 'Úspešne upravená mobilita');

    }

    public function destroy($id)
    {
        $mobility = Challenge::where('id', $id)->delete();

        LogActivity::addToLog('Zmazanie mobility');
        return response()->json($mobility);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\State;


class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(School::with('City')->get())
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Edit" 
                     class="edit btn btn-xs btn-warning edit-school"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Delete" id="delete-school"
                      class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $countries = Country::pluck("name", "id");

        LogActivity::addToLog('Školy index');
        return view('admin.pages.school', compact('countries'));
    }

    public function getState(Request $request)
    {
        $states = State::where("country_id", $request->country_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = City::where("state_id", $request->state_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'city_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'url' => 'required',
            'address' => 'required',
            'postcode' => 'required',
        ], [
                'name.required' => 'Názov školy je povinný.',
                'email.required' => 'Email je povinný.',
                'url.required' => 'Webová stránka školy je povinná.',
                'address.required' => 'Adresa školy povinná.',
                'postcode.required' => 'PSČ školy je povinné.',
                'city_id.required' => 'Mesto školy je povinné.',
            ]
        );

        $schoolId = $request->school_id;
        $school = School::updateOrCreate(
            ['id' => $schoolId],
            [
                'city_id' => $request->input('city'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'url' => $request->input('url'),
                'address' => $request->input('address'),
                'postcode' => $request->input('postcode')
            ]);

        LogActivity::addToLog('Pridanie / úprava školy');
        return response()->json($school);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $school = School::where($where)->first();

        return response()->json($school);
    }

    public function destroy($id)
    {
        $school = School::where('id', $id)->delete();

        LogActivity::addToLog('Zmazanie školy');
        return response()->json($school);
    }
}

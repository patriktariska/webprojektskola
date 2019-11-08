<?php

namespace App\Http\Controllers\Admin;

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
                    $btn = $btn. ' <a href="javascript:void(0)" data-toggle="tooltip" 
                     data-id="' . $row->id . '" data-original-title="Delete" id="delete-school"
                      class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $countries = Country::pluck("name","id");
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
        return response ()->json ($school);
    }
}

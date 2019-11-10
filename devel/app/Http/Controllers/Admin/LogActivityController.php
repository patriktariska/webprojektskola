<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity as Activity;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LogActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function myTestAddToLog()
    {
        Activity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }

    public function logActivity()
    {
        if (request()->ajax()) {
            return datatables()->of(Activity::logActivityLists())
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pages.logactivity');
    }

    public function destroyall()
    {
        DB::table('log_activity')->truncate();

        LogActivity::addToLog('Zmazanie všetkých logov');
        return redirect()->route('log.index')
            ->with('success', 'Úspešne si premazal logy webu!');
    }
}

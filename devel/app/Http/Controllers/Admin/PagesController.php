<?php

namespace App\Http\Controllers\Admin;

use App\Charts\SampleChart;
use App\Feedback;
use App\Helpers\LogActivity;
use App\Challenge;
use App\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Dashboard index page //
    public function index()
    {
        $countSchool = School::count();
        $countMobility = Challenge::count();
        $countFeedback = Feedback::count();
        $countLogs = LogActivity::logActivityLists()->count();

        $getCountFeedbackMonth = Feedback::orderBy('created_at')->get(['id', 'created_at'])
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('M');
            })
            ->map(function ($item) {
                return count($item);
            });

        $getCountMobilitiesMonth = Challenge::orderBy('created_at')->get(['id', 'created_at'])
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('M');
            })
            ->map(function ($item) {
                return count($item);
            });

        $chart = new SampleChart;
        $chart->labels($getCountFeedbackMonth->keys());
        $chart->dataset('Feedbackov', 'line', $getCountFeedbackMonth->values())->options([
            'backgroundColor' => ['#46BFBD']]);

        $chart2 = new SampleChart;
        $chart2->labels($getCountMobilitiesMonth->keys());
        $chart2->dataset('Mobilít', 'line', $getCountMobilitiesMonth->values())->options([
            'backgroundColor' => ['#F7464A']]);

        $user = User::with('Roles')->whereIn('name', ['admin','devel'])->latest()->paginate(5);

        LogActivity::addToLog('Dashboard index');
        return view('admin.pages.index', compact('countSchool' ,'countMobility',
            'countFeedback', 'countLogs', 'chart', 'chart2', 'user'));
    }

    // Profile Page //
    public function getProfile()
    {
        $user = User::get();

        LogActivity::addToLog('Profil');
        return view('admin.pages.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:25',
            'email' => 'required|unique:users,email,' . $request->user_id,
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
                'name.required' => 'Meno je povinné.',
                'email.required' => 'Email je povinný.',
                'password.required' => 'Heslo je povinné.',
            ]
        );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        LogActivity::addToLog('Úprava profilu');
        return redirect()->back()->with('success', 'Účet bol úspešne upravený.');
    }
}

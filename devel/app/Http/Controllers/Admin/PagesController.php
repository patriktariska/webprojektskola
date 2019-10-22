<?php

namespace App\Http\Controllers\Admin;

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

    // Profile Page //
    public function getProfile()
    {
        $user = User::get();
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

        return redirect()->back()->with('success', 'Účet bol úspešne upravený.');
    }
}

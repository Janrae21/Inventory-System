<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'newpassword' => 'nullable|min:8|confirmed',
        ]);


        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);


        if ($request->filled('newpassword')) {
            Auth::user()->update([
                'password' => Hash::make($request->input('newpassword')),
            ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}

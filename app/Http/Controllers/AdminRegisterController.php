<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    /**
     * Show the user registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Check if the user is an admin
        if (auth()->user()->usertype !== "1") {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'userid' => 'required|unique:users',
            'phoneno' => 'required',
            'name' => 'required',
        ]);


        $apartment = Auth::user()->apartment;


        // Create the new user
        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'userid' => $request->input('userid'),
            'phoneno' => $request->input('phoneno'),
            'name' => $request->input('name'),
            'apartment' => $apartment,
            'usertype' => 0,
            'firstlogin' => 0,
        ]);

        // Save the user
        $user->save();


        // Redirect the admin to the user list page
        return redirect('/redirect');
    }
}
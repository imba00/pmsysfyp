<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Models\Parcel;

class HomeControl extends Controller
{
    //

    function redFunc()
    {
        if (Auth::user()) {
            $typeuser = Auth::user()->usertype;

            if ($typeuser == '1') {
                $apartment = Auth::user()->apartment;
                // $data = Parcel::where('apartment', $apartment)->get();
                $data = Parcel::all();
                return view('admin.adminhome', ['parcellist' => $data, 'apartment' => $apartment]);
            } else if ($typeuser == '0') {
                $user = Auth::user();
                $data = Parcel::where('phoneno', $user->phoneno)->get();

                return view('home', ['parcellist' => $data, 'user' => $user, 'is_pin_shown' => false, 'showpin' => 0]);
            }
        } else {
            // $data = Project::paginate(5);
            // return view('homeguest', ['list' => $data]);

            return view('auth/login');
        }

    }
}
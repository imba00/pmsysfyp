<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Parcel;

class StudentController extends Controller
{
    //
    public function verifyPassword(Request $request)
    {
        $user = Auth::user();
        $inputPassword = $request->input('password');

        if (Hash::check($inputPassword, $user->password)) {

            $user = Auth::user();
            $data = Parcel::where('phoneno', $user->phoneno)->get();

            return view('home', ['parcellist' => $data, 'user' => $user, 'is_pin_shown' => true, 'showpin' => $request->id]);
        } else {
            return redirect()->back()->withErrors(['error' => 'Incorrect password. Please try again.']);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Parcel;

class AdminController extends Controller
{
    //

    function addparform()
    {
        $data = User::all();

        return view('admin.adminaddpar', ['studlist' => $data]);
    }

    public function getStudId($phoneno)
    {
        $user = User::where('phoneno', $phoneno)->first();
        if ($user) {
            return response()->json(['studid' => $user->userid]);
        } else {
            return response()->json(['studid' => null]);
        }
    }

    function deletepar($id)
    {
        $data = Parcel::find($id);
        $data->delete();
        return redirect('/redirect');

    }
    function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/studlist');
    }

    function registerparcel(Request $req)
    {
        $user = auth()->user();
        // Find user by phone number
        $userByPhone = User::where('phoneno', $req->phoneno)->first();
        $parcel = new Parcel;

        $lastParcel = DB::table('parcels')->orderBy('id', 'desc')->first();
        $lastId = $lastParcel ? $lastParcel->id : 0;

        if (!$userByPhone) {
            $parid = 'nf' . ($lastId + 1);
        } else {
            $parid = 'p' . $userByPhone->userid . ($lastId + 1);
        }


        $parcel->parid = $parid;
        $parcel->studid = $req->studid;
        $parcel->phoneno = $req->phoneno;
        $parcel->tracknum = $req->tracknum;
        $parcel->status = 1; //1 = ready for pickup
        $parcel->arrivedate = Carbon::now();
        $parcel->collectpin = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $parcel->apartment = $user->apartment; //temp


        $parcel->save();

        return redirect()->to('/redirect');

    }

    function collectpar($id)
    {
        $data = Parcel::find($id);
        $resident = User::where('userid', $data->studid)->first();

        return view('admin/admincollectparcel', ['parcel' => $data, 'resident' => $resident]);
    }

    function collectedparcel(Request $req)
    {
        $parcel = Parcel::find($req->id);

        if ($parcel->collectpin === $req->collectpin) {
            $parcel->status = 2;
            $parcel->collectdate = now(); // Set current date and time

            $parcel->save();
            return redirect()->to('/redirect');
        } else {
            return redirect()->back()->withErrors(['error' => 'The collect pin is incorrect. Please try again.']);
        }
    }




    function showstudent()
    {
        $apartment = Auth::user()->apartment;
        $data = User::where('usertype', 0)->get();

        return view('admin/adminstuddb', ['studentlist' => $data, 'apartment' => $apartment]);
    }


    function updateparform($id)
    {
        $data = Parcel::find($id);

        return view('admin/admineditparcel', ['parcel' => $data]);
    }
    function updatepar(Request $req)
    {
        $parcel = Parcel::find($req->id);

        $parcel->tracknum = $req->tracknum;
        $parcel->studid = $req->studid;
        $parcel->phoneno = $req->phoneno;
        $parcel->apartment = $req->apartment;
        $parcel->arrivedate = $req->arrivedate;
        $parcel->status = $req->status;
        $parcel->save();

        return redirect()->to('/redirect');
    }

    function editstud($id)
    {
        $data = User::find($id);

        return view('admin/admineditstudent', ['user' => $data]);
    }

    function updatestud(Request $req)
    {
        $user = User::find($req->id);

        $user->name = $req->name;
        $user->userid = $req->userid;
        $user->phoneno = $req->phoneno;
        $user->apartment = $req->apartment;
        $user->save();

        return redirect()->to('/studlist');
    }

}
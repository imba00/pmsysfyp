<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Project;

class HomeControl extends Controller
{
    //
    function index()
    {
        return view('homeguest');
    }

    function redFunc()
    {

        $typeuser = Auth::user()->usertype;
        $svid = Auth::user()->lectid;
        // dd($svid);

        if ($typeuser == '1') {
            $data = Project::paginate(5);
            return view('admin.adminhome', ['list' => $data]);
        } else if ($typeuser == '0') {
            $data = DB::table('projects')->where('svid', $svid)->get();
            $result = json_decode($data, true);

            return view('home', ['list' => $result]);
        } else {
            return view('homeguest');
        }
    }
}
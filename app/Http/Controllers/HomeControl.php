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
        $data = Project::paginate(5);
        return view('homeguest', ['list' => $data]);
    }

    function redFunc()
    {
        if (Auth::user()) {
            $typeuser = Auth::user()->usertype;

            if ($typeuser == '1') {
                $data = Project::paginate(5);
                return view('admin.adminhome', ['list' => $data]);
            } else if ($typeuser == '0') {
                // $data = DB::table('projects')->where('svid', $svid)->paginate(5);
                $data = DB::table('projects')->where('svid', Auth::user()->lectid)->get();
                $result = json_decode($data, true);

                return view('home', ['list' => $result]);
            }
        } else {
            $data = Project::paginate(5);
            return view('homeguest', ['list' => $data]);
        }

    }
}
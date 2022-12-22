<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class AdminController extends Controller
{
    //
    function deletestud($id)
    {
        $data = Project::find($id);
        $data->delete();
        return redirect('/redirect');

    }

    function assignproject(Request $req)
    {
        $project = new Project;

        $project->studid = $req->studid;
        $project->studname = $req->studname;
        $project->title = $req->title;
        $project->duration = $req->duration;
        $project->sdate = $req->sdate;
        $project->edate = $req->edate;
        $project->progress = "Milestone 1";
        $project->status = "NULL";
        $project->svid = $req->svid;
        $project->ex1 = $req->ex1;
        $project->ex2 = $req->ex2;
        $project->save();

        return redirect()->to('/redirect');
        ;
    }

    function showstud($id)
    {
        $data = Project::find($id);

        return view('admin/updatelist', ['disp' => $data]);
    }

    function updateproject(Request $req)
    {
        $project = Project::find($req->id);

        $project->studid = $req->studid;
        $project->studname = $req->studname;
        $project->title = $req->title;
        $project->duration = $req->duration;
        $project->sdate = $req->sdate;
        $project->edate = $req->edate;
        $project->progress = $req->progress;
        $project->status = $req->status;
        $project->svid = $req->svid;
        $project->ex1 = $req->ex1;
        $project->ex2 = $req->ex2;
        $project->save();

        return redirect()->to('/redirect');
        ;

    }
    function updatestatusprogress(Request $req)
    {
        $project = Project::find($req->id);

        $project->studid = $req->studid;
        $project->studname = $req->studname;
        $project->title = $req->title;
        $project->duration = $req->duration;
        $project->sdate = $req->sdate;
        $project->edate = $req->edate;
        $project->progress = $req->progress;
        $project->status = $req->status;
        $project->svid = $req->svid;
        $project->ex1 = $req->ex1;
        $project->ex2 = $req->ex2;
        $project->save();

        return redirect()->to('/redirect');
        ;
    }
}
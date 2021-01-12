<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\EmpProj;

class EmpProjController extends Controller
{
    //Function to return view of createEmpProj blade file in project folder
    public function create()
    {
        $emps = DB::table('users')->get();
        $projects = DB::table('projects')->get();
        return view('project.createEmpProj',\compact('emps','projects'));
    }

    //Function to store emp_projs data in database
    public function store(Request $request)
    {
        DB::table('emp_projs')->insert([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
            'status' => $request->status,
        ]);
        return \redirect()->back()->with('message', 'Employee and Project relation established Successfully');
    }


}

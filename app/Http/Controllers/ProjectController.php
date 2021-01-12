<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ProjectController extends Controller
{
    //Function to return view of createProject blade file in project folder
    public function create()
    {
        return view('project.createProject');
    }

    //Function to store project data in database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            # code...
            Project::create($request->all());
            return \redirect()->back()->with('message', 'Project Created Successfully');
        }
    }
}

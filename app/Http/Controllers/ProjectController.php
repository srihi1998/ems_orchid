<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.createProject');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:255',
            'startDate' => 'required|date|after:today',
            'endDate' => 'required|date|after:start_date'
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{
    public function create()
    {
        return view('issues.createIssue');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:255',
            'short_desc' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else {
            # code...
            $issue = auth()->user()->issues()->create($request->all());
            return \redirect()->back()->with('message', 'Issue Created Successfully');
        }
    }
}

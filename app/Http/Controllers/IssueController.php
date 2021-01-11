<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\IssueDetails;
use App\Models\IssueStatus;

class IssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function check_user_type(){
        $type=auth()->user()->user_type;
        return $type;
    }

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

    
    public function edit1($id)
    {
        $user_type=$this->check_user_type();
        
        if($user_type=="Admin"){
            $issue_detail = DB::table('issue_details')->where('id','=', $id)->get();
            $issueid;
            foreach ($issue_detail as $issue) {
                $issueid = $issue;
            }
            $admins = DB::table('users')->where('user_type','=', 'Admin')->get();
            $emp = DB::table('users')->where('id','=', $issueid->user_id)->get();
            $statuses = DB::table('issue_statuses')->where('issue_id','=',$issueid->id) 
                ->join('users', 'issue_statuses.resolved_by', '=', 'users.id' )->get();
            return view('issues.editIssue', \compact('admins','issueid','statuses','emp'));
        }
        return redirect()->back()->with('message','You Don\'t Have Access to the Page');
    }

    public function update1(Request $request,$id)
    {
        DB::table('issue_statuses')->insert([
            'issue_id' => $id,
            'resolved_by' => $request->resolved_by,
            'comment' => $request->comment,
            'update' => \Carbon\Carbon::now(),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(), 
        ]);
        DB::table('issue_details')->where('id', '=', $id)->update([
            'staus' => $request->staus,
            'update' => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return \redirect()->back()->with('message', 'Thank you for the suggestion.');
    }
}

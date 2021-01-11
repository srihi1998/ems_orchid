@extends('issues.layout')

@section('content')
<p> {{ 'Title: '.$issueid->title }}<p>
<p> {{ 'Type: '.$issueid->type }}<p>
<p> {{ 'Short Description: '.$issueid->short_desc }}<p>
<p> {{ 'Status: '.$issueid->staus }}</p>
<p> {{ 'Description: '.$issueid->desc }}<p>
@foreach ($emp as $user)
    <p> {{ 'Posted by: '.$user->name }}<p>
@endforeach
@if (count($statuses)>0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Resolved_by</th>
            <th scope="col">Comment</th>
            <th scope="col">Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($statuses as $status)
        <tr scope='row' >
            <td>{{ $status->name }}</td>
            <td>{{ $status->comment }}</td>
            <td>{{ $status->update }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<x-alert />
<form action="{{ '/issue_details/'.$issueid->id }}" method="POST">
    @csrf
    <fieldset>
        <legend>Issue Update Form</legend>
        <div class="form-group row">
            <label class="col-form-label col-sm-3 pt-0" for="resolved_by">Resolved By:</label>
            <div class="col-sm-9">
                <select class="custom-select mr-sm-3" name="resolved_by" id="resolved_by">
                    @foreach ( $admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="comment">Comment: </label>
            <div class="col-sm-9">
                <textarea id="comment" class="form-control" name="comment" placeholder="Write something.." value=" "></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <label class="col-form-label col-sm-3 pt-0" for="staus">Status:</label>
                <div class="col-sm-9">
                    <div class="form-check-input">
                        <input class="form-check-input" type="radio" id="In Progress" name="staus" value="In Progress"> In Progress
                        <input class="form-check-input" type="radio" id="Closed" name="staus" value="Closed">Closed
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>

<!--<a href="/profile"><button type="submit" class="btn btn-primary">Back</button></a>-->
@endsection
@extends('issues.layout')

@section('content')
<x-alert />
<form action="{{ route('issue.store') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Issues Form</legend>
        <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Title (required) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title"  value="" required
                    aria-required="true" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3 pt-0" for="type">Choose Issue Type:</label>
            <div class="col-sm-9">
                <select class="custom-select mr-sm-3" name="type" id="type">
                    <option value="Bug">Bug</option>
                    <option value="Feature Request">Feature Request</option>
                    <option value="Technical Issue">Technical Issue</option>
                    <option value="Desktop Hardware">Desktop Hardware</option>
                    <option value="Desktop Software">Desktop Software</option>
                    <option value="Server">Server</option>
                    <option value="Networking">Networking</option>
                    <option value="People Function">People Function</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="short_desc" class="col-sm-3 col-form-label">Short Desc(required) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="short_desc" name="short_desc" value="" required
                    aria-required="true">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="desc">Description: </label>
            <div class="col-sm-9">
                <textarea id="desc" class="form-control" name="desc" placeholder="Write something.." value=" "></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
@endsection
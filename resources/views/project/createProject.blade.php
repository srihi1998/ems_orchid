@extends('issues.layout')

@section('content')
<x-alert />
<form action="{{ route('project.store') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Project Form</legend>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="name">Name(required) :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="" required
                    aria-required="true">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="description">Description: </label>
            <div class="col-sm-9">
                <textarea id="description" class="form-control" name="description" placeholder="Write something.." value=" "></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="startDate">Start Date (required) :</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="startDate" name="startDate" required aria-required="true">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="endDate">End Date (required) :</label>
            <div class="col-sm-9">
                <input type="date"class="form-control"  id="endDate" name="endDate" required aria-required="true">
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
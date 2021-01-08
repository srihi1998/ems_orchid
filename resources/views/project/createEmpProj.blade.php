@extends('issues.layout')

@section('content')
<x-alert />
<form action="{{ route('emp_proj.store') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Employee Project Form</legend>

        <div class="form-group row">
            <label class="col-form-label col-sm-3 pt-0" for="user_id">Choose Employee Name:</label>
            <div class="col-sm-9">
                <select class="custom-select mr-sm-3" name="user_id" id="user_id">
                    @foreach ( $emps as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3 pt-0" for="project_id">Choose Project Name:</label>
            <div class="col-sm-9">
                <select class="custom-select mr-sm-3" name="project_id" id="project_id">
                    @foreach ( $projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
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
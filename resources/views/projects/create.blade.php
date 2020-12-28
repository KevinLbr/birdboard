@extends('layouts.app')

@section('content')
    <h1>Create a project</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required/>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>

        <button class="btn btn-primary">
            Create project
        </button>
        <a href="{{ route('projects.index') }}">Cancel</a>
    </form>
@endsection

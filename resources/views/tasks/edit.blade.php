@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form method="post" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection

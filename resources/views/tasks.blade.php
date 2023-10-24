@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Task List</div>

                <div class="card-body">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

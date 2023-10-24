@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{ isset($task) ? 'Edit Task' : 'Create Task' }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
                        @csrf
                        @if(isset($task))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="title">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ isset($task) ? $task->title : old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Task Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ isset($task) ? $task->description : old('description') }}</textarea>
                        </div>

                        <div class="form-group">
    <label for="category">Task Category</label>
    <select name="category" id="category" class="form-control">
        <option value="Category1" {{ (isset($task) && $task->category === 'Category1') ? 'selected' : '' }}>Category1</option>
        <option value="Category2" {{ (isset($task) && $task->category === 'Category2') ? 'selected' : '' }}>Category2</option>
        <option value="Category3" {{ (isset($task) && $task->category === 'Category3') ? 'selected' : '' }}>Category3</option>
    </select>
</div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Update Task' : 'Create Task' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

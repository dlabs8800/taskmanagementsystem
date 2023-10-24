
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="text" id="search-input" class="form-control" placeholder="Search tasks">
            </div>
            <div class="col-md-4">
                <select id="category-filter" class="form-control">
                    <option value="">All Categories</option>
                    <option value="Category1">Category 1</option>
                    <option value="Category2">Category 2</option>
                    <option value="Category3">Category 2</option>
                    <!-- Add options for other categories as needed -->
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" id="search-button" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">Task List</div>

        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->category }}</td>
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
            
            <!-- Message to show when no results are found -->
            <div id="no-results-message" class="alert alert-info" style="display: none;">
                No matching results found.
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    $(document).ready(function() {
        var $dataRows = $('#data-table tr');
        var $noResultsMessage = $('#no-results-message');

        function performSearch() {
            var searchText = $('#search-input').val().toLowerCase();
            var selectedCategory = $('#category-filter').val().toLowerCase();

            $dataRows.each(function() {
                var itemText = $(this).text().toLowerCase();
                var categoryText = $(this).find('td:eq(2)').text().toLowerCase(); // Index 2 for Category

                if (
                    itemText.includes(searchText) &&
                    (selectedCategory === '' || categoryText.includes(selectedCategory))
                ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Show or hide the no results message
            $noResultsMessage.toggle(!$dataRows.is(':visible'));
        }

        // When the search input changes
        $('#search-input').on('input', performSearch);
        $('#category-filter').on('change', performSearch);

        // When the search button is clicked
        $('#search-button').click(performSearch);
    });
</script>

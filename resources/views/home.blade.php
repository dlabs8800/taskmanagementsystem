@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Add the button with a link to the /tasks route -->
                 
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">
                        Add Daily Tasks
                    </a>
@endsection


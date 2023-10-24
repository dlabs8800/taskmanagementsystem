@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <!-- Add more user information here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

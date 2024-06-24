@extends('dashboard')

@section('mainContent')

<div class="container mt-4">
    <h2>All Employee Details</h2>
    <div class="row">
        @foreach ($employees as $employee)
        <div class="col-md-4 mb-4">
            <div class="card employee-card">
                <i class="fas fa-user card-body-icon"></i>

                <div class="card-body">
                    <h5 class="card-title">{{ $employee->name }}</h5>
                    <p class="card-text"><strong>Position:</strong> {{ $employee->position }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                    <p class="card-text"><strong>No Telp:</strong> {{ $employee->no_telp }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
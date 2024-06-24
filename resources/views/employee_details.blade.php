@extends('dashboard')

@section('mainContent')
<div class="container py-5">
    <div class="header-text pb-3">
        <h1 class="card-title">Details {{ $employee->name }}</h1>
    </div>
    <div class="card">
        <div class="card-header">
            Employee Details
        </div>
        <div class="card-body">
        <p class="card-text"><strong>Name:</strong> {{ $employee->name }}</p>
            <p class="card-text"><strong>Position:</strong> {{ $employee->position }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>No Telp:</strong> {{ $employee->no_telp }}</p>
        </div>
    </div>
</div>
@endsection
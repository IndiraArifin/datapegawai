@extends('dashboard')

@section('mainContent')
<div class="container pt-3">
    <h2>{{ isset($employee) ? 'Edit' : 'Add New' }} Employee</h2>
    <form id="employeeForm" action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $employee->name ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $employee->email ?? '' }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Submit' }}</button>
    </form>
</div>
<script>
document.getElementById('employeeForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const form = this;
    const isEditing = "{{ isset($employee) ? 'true' : 'false' }}";
    const swalTitle = isEditing === 'true' ? 'Are you sure?' : 'Add New Employee?';
    const swalText = isEditing ? 'Change this data?' : 'Add this new employee to the database?';

    Swal.fire({
        title: swalTitle,
        text: swalText,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, Save Data!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
</script>
@endsection
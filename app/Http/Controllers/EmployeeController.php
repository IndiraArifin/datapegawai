<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee_list', compact('employees'));
    }
    
    public function create()
    {
        return view('add_edit_employee');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'nullable|max:255',
            'email' => 'required|email|unique:employees,email',
        ]);
    
        Employee::create($validatedData);
    
        return redirect('/employees')->with('success', 'Employee added successfully!');
    }
    
    public function show($id)
{
    $employee = Employee::findOrFail($id);
    return view('employee_details', compact('employee'));
}
    public function edit($id)
{
    $employee = Employee::findOrFail($id);
    return view('add_edit_employee', compact('employee'));
}

public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'position' => 'nullable|max:255',
        'email' => 'required|email|unique:employees,email,' . $id, 
    ]);

    $employee->update($validatedData);

    return redirect('/employees')->with('success', 'Employee updated successfully!');
}

public function destroy($id)
{
    Employee::destroy($id);
    return redirect('/employees');
}
public function details($id)
{
    $employee = Employee::findOrFail($id);
    return view('employee_details', compact('employee'));
}

public function allDetails()
{
    $employees = Employee::all(); 
    return view('all_employee_details', compact('employees'));
}


};

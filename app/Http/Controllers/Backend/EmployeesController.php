<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;  // Correct model name
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('backend.pages.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.pages.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string|max:15',
            'department' => 'nullable|string',
            'job_title' => 'nullable|string',
            'manager' => 'nullable|string',
            'employment_type' => 'required|in:Full-Time,Part-Time,Contract',
            'status' => 'required|in:Active,On Leave,Terminated',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'nationality' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'currency' => 'nullable|string|max:10',
            'bank_account_number' => 'nullable|string',
            //photo' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Employee::create($request->all());

        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('backend.pages.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('backend.pages.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string|max:15',
            'department' => 'nullable|string',
            'job_title' => 'nullable|string',
            'manager' => 'nullable|string',
            'employment_type' => 'required|in:Full-Time,Part-Time,Contract',
            'status' => 'required|in:Active,On Leave,Terminated',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'nationality' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'currency' => 'nullable|string|max:10',
            'bank_account_number' => 'nullable|string',
           // 'photo' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $employee->update($request->all());

        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }
}

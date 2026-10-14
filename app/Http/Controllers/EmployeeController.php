<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::withCount('shift')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $shifts = Shift::all();
        return view('employees.create', compact('shifts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'shift_id' => 'required|exists:shifts,id',
            'joining_date' => 'required|date',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee)
    {
        $shifts = Shift::all();
        return view('employees.edit', compact('employee', 'shifts'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'shift_id' => 'required|exists:shifts,id',
            'joining_date' => 'required|date',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
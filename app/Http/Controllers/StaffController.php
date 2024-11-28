<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    // Hanya untuk operator
    public function index()
    {

        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    // Hanya untuk operator
    public function create()
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('staff.index')->with('error', 'Unauthorized access.');
        }

        return view('staff.create');
    }

    // Hanya untuk operator
    public function store(Request $request)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('staff.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'position' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    // Hanya untuk operator
    public function edit($id)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('index.staff')->with('error', 'Unauthorized access.');
        }

        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    // Hanya untuk operator
    public function update(Request $request, $id)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('index.staff')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'position' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    // Hanya untuk operator
    public function destroy($id)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('index.staff')->with('error', 'Unauthorized access.');
        }

        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}

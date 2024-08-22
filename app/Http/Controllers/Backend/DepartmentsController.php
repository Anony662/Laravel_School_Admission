<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department; // Ensure this is the correct path for your Department model
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('backend.pages.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:255|unique:departments',
            'description' => 'nullable|string',
        ]);

        // Create New Department
        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        session()->flash('success', 'Department has been created !!');
        return redirect()->route('admin.departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        if (is_null($department)) {
            abort(404, 'Department not found');
        }
        return view('backend.pages.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        if (is_null($department)) {
            abort(404, 'Department not found');
        }
        return view('backend.pages.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        if (is_null($department)) {
            abort(404, 'Department not found');
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:255|unique:departments,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        session()->flash('success', 'Department has been updated !!');
        return redirect()->route('admin.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if (!is_null($department)) {
            $department->delete();
        }

        session()->flash('success', 'Department has been deleted !!');
        return redirect()->route('admin.departments.index');
    }
}

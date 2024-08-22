<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course; // Ensure this is the correct path for your Course model
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('backend.pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.courses.create');
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
            'course_name' => 'required|max:255',
            'description' => 'nullable|string',
            'department' => 'nullable|string',
            'semester' => 'nullable|string',
            'year' => 'nullable|integer|digits:4',
            'instructor' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        // Create New Course
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->department = $request->department;
        $course->semester = $request->semester;
        $course->year = $request->year;
        $course->instructor = $request->instructor;
        $course->status = $request->status;
        $course->save();

        session()->flash('success', 'Course has been created !!');
        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        if (is_null($course)) {
            abort(404, 'Course not found');
        }
        return view('backend.pages.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        if (is_null($course)) {
            abort(404, 'Course not found');
        }
        return view('backend.pages.courses.edit', compact('course'));
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
        $course = Course::find($id);
        if (is_null($course)) {
            abort(404, 'Course not found');
        }

        // Validation Data
        $request->validate([
            'course_name' => 'required|max:255',
            'description' => 'nullable|string',
            'department' => 'nullable|string',
            'semester' => 'nullable|string',
            'year' => 'nullable|integer|digits:4',
            'instructor' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->department = $request->department;
        $course->semester = $request->semester;
        $course->year = $request->year;
        $course->instructor = $request->instructor;
        $course->status = $request->status;
        $course->save();

        session()->flash('success', 'Course has been updated !!');
        return redirect()->route('admin.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!is_null($course)) {
            $course->delete();
        }

        session()->flash('success', 'Course has been deleted !!');
        return redirect()->route('admin.courses.index');
    }
}

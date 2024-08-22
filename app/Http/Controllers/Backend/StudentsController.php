<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->get();
        return view('backend.pages.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.pages.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone_number' => 'nullable|string|max:15',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:15',
            'mother_phone' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'birth_certificate' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'passport_attachment' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'academic_certificates' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'nationality' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'course' => 'nullable|string|max:255',
            'preferred_country' => 'nullable|string|max:255',
        ]);

        $studentData = $request->except(['profile_image', 'birth_certificate', 'passport_attachment', 'academic_certificates']);

        // Handle file uploads
        if ($request->hasFile('profile_image')) {
            $studentData['profile_image'] = $request->file('profile_image')->store('profile_images');
        }
        if ($request->hasFile('birth_certificate')) {
            $studentData['birth_certificate'] = $request->file('birth_certificate')->store('attachments');
        }
        if ($request->hasFile('passport_attachment')) {
            $studentData['passport_attachment'] = $request->file('passport_attachment')->store('attachments');
        }
        if ($request->hasFile('academic_certificates')) {
            $studentData['academic_certificates'] = $request->file('academic_certificates')->store('attachments');
        }

        Student::create($studentData);

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.students.index')->with('success', 'Student created successfully.');
        }

        return redirect()->route('home')->with('success', 'Student form submitted successfully.');
    }

    public function show(Student $student)
    {
        return view('backend.pages.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('backend.pages.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:15',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:15',
            'mother_phone' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'birth_certificate' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'passport_attachment' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'academic_certificates' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'nationality' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'course' => 'nullable|string|max:255',
            'preferred_country' => 'nullable|string|max:255',
        ]);

        $studentData = $request->except(['profile_image', 'birth_certificate', 'passport_attachment', 'academic_certificates']);

        if ($request->hasFile('profile_image')) {
            if ($student->profile_image && Storage::exists($student->profile_image)) {
                Storage::delete($student->profile_image);
            }
            $studentData['profile_image'] = $request->file('profile_image')->store('profile_images');
        }
        if ($request->hasFile('birth_certificate')) {
            if ($student->birth_certificate && Storage::exists($student->birth_certificate)) {
                Storage::delete($student->birth_certificate);
            }
            $studentData['birth_certificate'] = $request->file('birth_certificate')->store('attachments');
        }
        if ($request->hasFile('passport_attachment')) {
            if ($student->passport_attachment && Storage::exists($student->passport_attachment)) {
                Storage::delete($student->passport_attachment);
            }
            $studentData['passport_attachment'] = $request->file('passport_attachment')->store('attachments');
        }
        if ($request->hasFile('academic_certificates')) {
            if ($student->academic_certificates && Storage::exists($student->academic_certificates)) {
                Storage::delete($student->academic_certificates);
            }
            $studentData['academic_certificates'] = $request->file('academic_certificates')->store('attachments');
        }

        $student->update($studentData);

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
        }

        return redirect()->route('home')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        if ($student->profile_image && Storage::exists($student->profile_image)) {
            Storage::delete($student->profile_image);
        }
        if ($student->birth_certificate && Storage::exists($student->birth_certificate)) {
            Storage::delete($student->birth_certificate);
        }
        if ($student->passport_attachment && Storage::exists($student->passport_attachment)) {
            Storage::delete($student->passport_attachment);
        }
        if ($student->academic_certificates && Storage::exists($student->academic_certificates)) {
            Storage::delete($student->academic_certificates);
        }

        $student->delete();

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
        }

        return redirect()->route('home')->with('success', 'Student deleted successfully.');
    }
}

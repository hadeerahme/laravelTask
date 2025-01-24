<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track', 'courses')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $tracks = Track::all();
        $courses = Course::all();
        return view('students.create', compact('tracks', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'track_id' => 'required|exists:tracks,id',
            'courses' => 'required|array',
        ]);

        $student = Student::create($request->only('name', 'email', 'track_id'));
        $student->courses()->attach($request->courses);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $tracks = Track::all();
        $courses = Course::all();
        return view('students.edit', compact('student', 'tracks', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'track_id' => 'required|exists:tracks,id',
            'courses' => 'required|array',
        ]);

        $student->update($request->only('name', 'email', 'track_id'));
        $student->courses()->sync($request->courses);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->courses()->detach();
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
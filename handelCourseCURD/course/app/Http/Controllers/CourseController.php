<?php

// app/Http/Controllers/CourseController.php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show all courses
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Show form to create a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store new course in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'required|url'
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    // Show course details
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show form to edit course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update course in the database
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'required|url'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}

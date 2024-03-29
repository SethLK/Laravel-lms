<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Page;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('instructor_id', auth()->user()->id)->paginate(10);

        $enrolled_courses = auth()->user()->courses;
        return view("dashboard.panel", compact("courses", "enrolled_courses"));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'instructor_id' => auth()->user()->id,
        ]);
        return redirect()->route("dashboard")->with('success', 'Course Created successfully.');
    }

    public function show_by_course_id($course_id)
    {
        $course = Course::with('pages')->find($course_id);
        $enrolledUsers = $course->users;
        return view("course.view", compact("course", "enrolledUsers"));
    }

    public function edit($course_id)
    {
        $course = Course::find($course_id);
        return view("dashboard.edit", compact("course"));
    }

    public function update_(Request $request, $course_id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $course = Course::find($course_id);
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route("dashboard")->with('success', 'Title updated successfully.');
    }

    public function delete($course_id)
    {
        $course = Course::find($course_id);

        if (!$course) {
            return redirect()->route("dashboard")->with('error', 'Course not found.');
        }

        $course->delete();
        return redirect()->route("dashboard")->with('success', 'Course deleted successfully.');
    }


}

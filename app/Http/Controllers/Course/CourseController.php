<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //Render Course Controller/ CURD page
    public function index()
    {
        $courses = Course::all();
        return view("dashboard.panel", compact("courses"));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
        ]);
        return redirect()->route("dashboard")->with('success', 'Course Created successfully.');
    }

    public function show_by_course_id($course_id){

    }
}

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
        return view("dashboard.create");
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
        ]);
        return redirect()->back()->with('success', 'Course Created successfully.');
    }
}

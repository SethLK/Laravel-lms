<?php

namespace App\Http\Controllers\Enroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class EnrollController extends Controller
{
    public function enroll(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = auth()->user();

        if (!$user->courses->contains($course)) {
            $user->courses()->attach($course);
            return redirect()->back()->with('success', 'Enrolled successfully.');
        } else {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }
    }

    public function unenroll(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = auth()->user();

        if ($user->courses->contains($course)) {
            $user->courses()->detach($course);
            return redirect()->back()->with('success', 'Unenrolled successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }
    }
}

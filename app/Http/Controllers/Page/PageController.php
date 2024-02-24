<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Page;

class PageController extends Controller
{
    public function create(Request $request, $course_id){
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $course = Course::findOrFail($course_id);

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->content;

        $course->pages()->save($page);
        return redirect()->route('showById', $course_id)->with('success', 'Page created successfully.');


    }

}

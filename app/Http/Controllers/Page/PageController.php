<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Page;

class PageController extends Controller
{
    public function create(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required|string',
            'page_content' => 'required|string',
        ]);

        $course = Course::findOrFail($course_id);

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->page_content;

        $course->pages()->save($page);
        return redirect()->route('showById', $course_id)->with('success', 'Page created successfully.');
    }

    public function viewPage($course_id, $page_id)
    {

        $page = Page::where('course_id', $course_id)->findOrFail($page_id);
        return view("page", compact("page"));
    }

    public function viewPage_edit($course_id, $page_id)
    {
        $course = Course::findOrFail($course_id);
        $page = Page::where('course_id', $course_id)->findOrFail($page_id);
        return view("page.editPage", compact("course","page"));
    }

    public function updatePage(Request $request, $course_id, $page_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'page_content' => 'required|string',
        ]);

        $page = Page::where('course_id', $course_id)->findOrFail($page_id);

        $page->update([
            'title' => $request->title,
            'page_content' => $request->page_content,
        ]);

        return redirect()->route("page")->with('success', 'Page updated successfully.');

    }
}

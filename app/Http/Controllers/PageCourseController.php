<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PageCourseController extends Controller
{
    public function __invoke(Request $request, Course $course)
    {
        return view('course-details', compact('course'));
    }
}

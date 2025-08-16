<?php

namespace App\Http\Controllers;

use App\Models\Course;

class PageVideosController extends Controller
{
    public function __invoke(Course $course)
    {
        return view('page.videos');
    }
}

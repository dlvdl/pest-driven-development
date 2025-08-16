<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCourseController extends Controller
{
    public function __invoke(Request $request, Course $course)
    {
        if (! $course->released_at) {
            throw new NotFoundHttpException;
        }

        $course->loadCount('videos');

        return view('pages.course-details', compact('course'));
    }
}

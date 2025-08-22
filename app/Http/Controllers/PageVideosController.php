<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;

class PageVideosController extends Controller
{
    public function __invoke(Course $course, Video $video)
    {
        $course->load('videos');
        $video = $video->exists ? $video : $course->videos->first();

        return view('pages.videos', compact('video'));
    }
}

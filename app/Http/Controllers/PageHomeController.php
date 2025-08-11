<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::query()
            ->whereNotNull('released_at')
            ->orderByDesc('released_at')
            ->get();

        return view('home', compact('courses'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $purchasedCourses = $request->user()
            ->purchasedCourses()
            ->get();

        return view('pages.dashboard', compact('purchasedCourses'));
    }
}

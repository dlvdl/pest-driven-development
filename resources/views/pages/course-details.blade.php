<!DOCTYPE html>
<html lang="en" data-theme="light" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Web Development - EduPlatform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
          rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <style>
        :root {
            --color-zinc-50: #fafafa;
            --color-zinc-100: #f5f5f5;
            --color-zinc-200: #e5e5e5;
            --color-zinc-300: #d4d4d4;
            --color-zinc-400: #a3a3a3;
            --color-zinc-500: #737373;
            --color-zinc-600: #525252;
            --color-zinc-700: #404040;
            --color-zinc-800: #262626;
            --color-zinc-900: #171717;
            --color-zinc-950: #0a0a0a;
            --color-accent: #262626;
            --color-accent-content: #262626;
            --color-accent-foreground: #ffffff;
            --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }

        .dark {
            --color-accent: #ffffff;
            --color-accent-content: #ffffff;
            --color-accent-foreground: #262626;
        }

        body {
            font-family: var(--font-sans);
        }

        .flux-button {
            @apply inline-flex items-center justify-center rounded-md px-4 py-2.5 text-sm font-medium transition-colors;
            @apply bg-zinc-900 text-white hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:ring-offset-2;
        }

        .flux-button-outline {
            @apply border border-zinc-300 bg-transparent text-zinc-900 hover:bg-zinc-50;
        }

        .flux-button-secondary {
            @apply bg-zinc-100 text-zinc-900 hover:bg-zinc-200;
        }

        .flux-card {
            @apply bg-white border border-zinc-200 rounded-lg shadow-sm;
        }

        .theme-toggle {
            @apply p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors;
        }
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
              zinc: {
                50: '#fafafa',
                100: '#f5f5f5',
                200: '#e5e5e5',
                300: '#d4d4d4',
                400: '#a3a3a3',
                500: '#737373',
                600: '#525252',
                700: '#404040',
                800: '#262626',
                900: '#171717',
                950: '#0a0a0a',
              }
            }
          }
        }
      }
    </script>
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100">
<!-- Navigation -->
<nav
    class="border-b border-zinc-200 dark:border-zinc-800 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-semibold text-zinc-900 dark:text-white">
                        <span class="text-zinc-600 dark:text-zinc-400">Edu</span>Platform
                    </a>
                </div>
                <div class="hidden md:ml-8 md:flex md:items-center md:space-x-1">
                    <a href="#"
                       class="text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Courses
                    </a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Theme Toggle -->
                <button onclick="toggleTheme()" class="theme-toggle">
                    <svg id="sun-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="moon-icon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                <!-- User Menu -->
                <div class="relative">
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button"
                             class="flex items-center space-x-2 p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <div
                                class="w-8 h-8 bg-zinc-900 dark:bg-zinc-100 text-white dark:text-zinc-900 rounded-full flex items-center justify-center text-sm font-medium">
                                U
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-lg z-[1] mt-3 w-52 p-2 shadow-lg">
                            <li>
                                <a class="text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800">Profile</a>
                            </li>
                            <li>
                                <a class="text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800">My
                                    Courses</a></li>
                            <li><a class="text-red-600 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/20">Sign
                                    Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Course Header -->
<section class="relative bg-white dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Course Info -->
            <div class="lg:col-span-2">
                <div class="mb-6">
                        <span
                            class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400 mb-4">
                            Beginner Friendly
                        </span>
                    <h1 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                        {{ $course->title }}
                    </h1>
                    <h2  class="text-xl text-zinc-600 dark:text-zinc-400 mb-6">
                        {{ $course->tagline }}
                    </h2>
                </div>

                <!-- Course Stats -->
                <div class="flex flex-wrap gap-6 text-sm text-zinc-600 dark:text-zinc-400 mb-8">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        <span id="videos-count">{{ $course->videos->count() }} videos</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>12 weeks</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>1,250 students</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span>4.8 (2,341 reviews)</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="flux-button px-8 py-3 text-base flex items-center gap-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Enroll Now - $89
                    </button>
                    <button
                        class="flux-button-outline flex items-center gap-2 px-8 py-3 text-base border border-zinc-300 dark:border-zinc-700 text-zinc-900 dark:text-zinc-100 hover:bg-zinc-50 dark:hover:bg-zinc-800">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Add to Wishlist
                    </button>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="flux-card overflow-hidden dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="aspect-video">
                        <img src="{{ asset("images/$course->image_name") }}" alt="{{ $course->title }}" class="w-full h-full object-cover"/>
                    </div>
                    <div class="p-6">
                        <div class="text-center">
                            <button class="flux-button w-full mb-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Preview Course
                            </button>
                            <p class="text-xs text-zinc-500 dark:text-zinc-400">30-day money-back guarantee</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Description -->
            <section>
                <h3 class="text-2xl font-semibold text-zinc-900 dark:text-white mb-6">Course Description</h3>
                <div id="course-description" class="prose prose-zinc dark:prose-invert max-w-none">
                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">
                        {{ $course->description }}
                    </p>
                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mt-4">
                        {{ $course->description }}
                    </p>
                </div>
            </section>

            <!-- What You'll Learn -->
            <section>
                <h3 class="text-2xl font-semibold text-zinc-900 dark:text-white mb-6">What You'll Learn</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($course->learnings as $learning)
                                <li>{{ $learning }}</li>
                        @endforeach
                </ul>
            </section>

            <!-- Course Curriculum -->
            <section>
                <h3 class="text-2xl font-semibold text-zinc-900 dark:text-white mb-6">Course Curriculum</h3>
                <div class="space-y-4">
                    <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Section 1: HTML
                                    Fundamentals</h4>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">8 lessons • 2 hours</p>
                            </div>
                            <button class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Section 2: CSS Styling &
                                    Layout</h4>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">12 lessons • 3.5 hours</p>
                            </div>
                            <button class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Section 3: JavaScript
                                    Programming</h4>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">15 lessons • 4.5 hours</p>
                            </div>
                            <button class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-zinc-900 dark:text-white mb-2">Section 4: React
                                    Framework</h4>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">10 lessons • 3 hours</p>
                            </div>
                            <button class="text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-8">
                <!-- Course Features -->
                <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                    <h4 class="font-semibold text-zinc-900 dark:text-white mb-4">This course includes:</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span id="videos-count-sidebar">45 hours of video content</span>
                        </li>
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            20+ coding exercises
                        </li>
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            5 real-world projects
                        </li>
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            Certificate of completion
                        </li>
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            Lifetime access
                        </li>
                        <li class="flex items-center text-zinc-600 dark:text-zinc-400">
                            <svg class="w-4 h-4 mr-3 text-green-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            Access on mobile and TV
                        </li>
                    </ul>
                </div>

                <!-- Instructor -->
                <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                    <h4 class="font-semibold text-zinc-900 dark:text-white mb-4">Your Instructor</h4>
                    <div class="flex items-start space-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=face"
                            alt="Instructor" class="w-12 h-12 rounded-full"/>
                        <div>
                            <h5 class="font-medium text-zinc-900 dark:text-white mb-1">John Mitchell</h5>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-2">Senior Full-Stack Developer</p>
                            <div class="flex items-center space-x-4 text-xs text-zinc-500 dark:text-zinc-400">
                                <span>4.9★ Rating</span>
                                <span>50K+ Students</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Share Course -->
                <div class="flux-card p-6 dark:bg-zinc-800 dark:border-zinc-700">
                    <h4 class="font-semibold text-zinc-900 dark:text-white mb-4">Share this course</h4>
                    <div class="flex space-x-3">
                        <button
                            class="flex-1 flux-button-secondary px-4 py-2 text-sm dark:bg-zinc-700 dark:text-zinc-100 dark:hover:bg-zinc-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                            LinkedIn
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800 mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-2">
                    <span class="text-zinc-600 dark:text-zinc-400">Edu</span>Platform
                </h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Your gateway to knowledge and growth</p>
            </div>
            <div class="flex space-x-8 text-sm">
                <a href="#"
                   class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">About</a>
                <a href="#"
                   class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Privacy</a>
                <a href="#"
                   class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Terms</a>
                <a href="#"
                   class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Support</a>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-zinc-200 dark:border-zinc-800 text-center">
            <p class="text-sm text-zinc-500 dark:text-zinc-500">© 2024 EduPlatform. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>
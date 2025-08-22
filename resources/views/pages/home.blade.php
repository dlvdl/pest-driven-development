<!DOCTYPE html>
<html lang="en" data-theme="light" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlatform - Learn Without Limits</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
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

        .flux-card {
            @apply bg-white border border-zinc-200 rounded-lg shadow-sm;
        }

        .flux-input {
            @apply block w-full rounded-md border border-zinc-300 px-3 py-2 text-sm placeholder-zinc-400;
            @apply focus:border-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:ring-offset-2;
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
<nav class="border-b border-zinc-200 dark:border-zinc-800 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-semibold text-zinc-900 dark:text-white">
                        <span class="text-zinc-600 dark:text-zinc-400">Edu</span>Platform
                    </h1>
                </div>
                <div class="hidden md:ml-8 md:flex md:space-x-8">
                    <a href="#" class="text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors">Courses</a>
                    <a href="#" class="text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors">About</a>
                    <a href="#" class="text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="theme-toggle">
                    <svg id="sun-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="moon-icon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                <div id="auth-section">
                    @guest
                        <div>
                            <flux:link class="text-zinc-600 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white px-3 py-2 text-sm font-medium transition-colors" variant="ghost" href="{{ route('login') }}">Login</flux:link>
                        </div>
                    @endguest

                    @auth()
                        <div id="auth-view" class="relative">
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="flex items-center space-x-2 p-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                    <div class="w-8 h-8 bg-zinc-900 dark:bg-zinc-100 text-white dark:text-zinc-900 rounded-full flex items-center justify-center text-sm font-medium">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                    <svg class="w-4 h-4 text-zinc-600 dark:text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <ul tabindex="0" class="menu menu-sm dropdown-content bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-lg z-[1] mt-3 w-52 p-2 shadow-lg">
                                    <li>
                                        <a href="{{ route('settings.profile') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('settings.profile') }}" class="text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800">
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <form method="post" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/20">Log out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative py-24 sm:py-32">
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-zinc-50 to-zinc-100 dark:from-zinc-950 dark:to-zinc-900"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-zinc-900 dark:text-white mb-6">
                Learn Without
                <span class="text-zinc-600 dark:text-zinc-400">Limits</span>
            </h1>
            <p class="text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto mb-10">
                Discover world-class courses taught by industry experts. Transform your career with hands-on learning and practical skills that matter.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="flux-button flex gap-1 items-center px-8 py-3 text-base">
                    Start Learning
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
                <button class="flux-button flex gap-1 items-center flux-button-outline px-8 py-3 text-base">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Watch Demo
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 border-t border-b border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-3xl font-bold text-zinc-900 dark:text-white mb-2" id="course-count">{{ $courses->count() }}</div>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400 uppercase tracking-wide">Total Courses</div>
                <div class="text-xs text-zinc-500 dark:text-zinc-500 mt-1">Growing weekly</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-zinc-900 dark:text-white mb-2">12K+</div>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400 uppercase tracking-wide">Active Students</div>
                <div class="text-xs text-zinc-500 dark:text-zinc-500 mt-1">From 50+ countries</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-zinc-900 dark:text-white mb-2">94%</div>
                <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400 uppercase tracking-wide">Success Rate</div>
                <div class="text-xs text-zinc-500 dark:text-zinc-500 mt-1">Course completion</div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                Featured Courses
            </h2>
            <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">
                Carefully curated courses designed to help you master in-demand skills and advance your career
            </p>
        </div>

        <div id="courses-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($courses as $course)
                <div class="flux-card overflow-hidden hover:shadow-md transition-shadow duration-300 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="aspect-video">
                        <img alt="{{ $course->title }}" class="w-full h-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">{{ $course->title }}</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-4">{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty state -->
        <div id="empty-state" class="text-center py-24 hidden">
            <div class="w-16 h-16 mx-auto mb-6 bg-zinc-100 dark:bg-zinc-800 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-zinc-400 dark:text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-2">No courses available</h3>
            <p class="text-zinc-600 dark:text-zinc-400">Check back soon for exciting new learning opportunities</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-24 bg-zinc-50 dark:bg-zinc-900 border-t border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                Why Choose Our Platform?
            </h2>
            <p class="text-lg text-zinc-600 dark:text-zinc-400">
                Everything you need to succeed in your learning journey
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flux-card p-8 text-center dark:bg-zinc-800 dark:border-zinc-700">
                <div class="w-12 h-12 mx-auto mb-6 bg-zinc-100 dark:bg-zinc-700 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-600 dark:text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364-.707l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">Expert-Led Content</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Learn from industry professionals with years of real-world experience and proven track records.</p>
            </div>

            <div class="flux-card p-8 text-center dark:bg-zinc-800 dark:border-zinc-700">
                <div class="w-12 h-12 mx-auto mb-6 bg-zinc-100 dark:bg-zinc-700 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-600 dark:text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">Industry Certification</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Earn recognized certificates that showcase your skills to employers and advance your career.</p>
            </div>

            <div class="flux-card p-8 text-center dark:bg-zinc-800 dark:border-zinc-700">
                <div class="w-12 h-12 mx-auto mb-6 bg-zinc-100 dark:bg-zinc-700 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-zinc-600 dark:text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">Lifetime Access</h3>
                <p class="text-zinc-600 dark:text-zinc-400">Access your courses anytime, anywhere, with lifetime updates and continuous learning support.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-2">
                    <span class="text-zinc-600 dark:text-zinc-400">Edu</span>Platform
                </h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Your gateway to knowledge and growth</p>
            </div>
            <div class="flex space-x-8 text-sm">
                <a href="#" class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">About</a>
                <a href="#" class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Privacy</a>
                <a href="#" class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Terms</a>
                <a href="#" class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Support</a>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-zinc-200 dark:border-zinc-800 text-center">
            <p class="text-sm text-zinc-500 dark:text-zinc-500">© 2024 EduPlatform. All rights reserved.</p>
        </div>
    </div>
</footer>
<body/>
<html/>

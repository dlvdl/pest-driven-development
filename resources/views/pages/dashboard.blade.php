<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <ul class="list rounded-box dark:text-white">
                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">List of purchased courses</li>

                @foreach($purchasedCourses as $purchasedCourse)
                    <li class="list-row">
                        <div><img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/></div>
                        <div>
                            <div>Dio Lupa</div>
                            <div class="text-xs uppercase font-semibold opacity-60">{{ $purchasedCourse->title }}</div>
                        </div>
                        <p class="list-col-wrap text-xs">
                            {{ $purchasedCourse->description }}
                        </p>
                        <a class="link text-green-500" href="{{ route('page.course-videos', $purchasedCourse) }}">Watch videos</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layouts.app>

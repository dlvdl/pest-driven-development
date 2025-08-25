<div class="container mx-auto px-6 py-8 max-w-8xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="card bg-base-100">
                <div class="card-body p-6">
                    <div class="mb-6">
                        <flux:heading size="xl" class="mb-3">
                            {{ $video->title }}
                            <span class="badge badge-outline badge-lg ml-3">{{ $video->getReadableDuration() }}</span>
                        </flux:heading>
                        <flux:text>
                            {{ $video->description }}
                        </flux:text>
                    </div>

                    <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-primary/20 to-secondary/20 mb-6">
                        <div class="bg-black rounded-xl overflow-hidden">
                            <div class="aspect-video">
                                <iframe
                                    src="https://player.vimeo.com/video/{{ $video->vimeo_id }}"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allow="autoplay; fullscreen"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="card bg-gradient-to-br from-base-100 to-base-200">
                <div class="card-body p-0">
                    <div class="bg-gradient-to-r from-primary to-secondary p-6 rounded-t-2xl">
                        <flux:heading size="lg">Videos in this course</flux:heading>
                        <flux:text>{{ count($courseVideos) }} total videos</flux:text>
                    </div>

                    <div class="max-h-96 overflow-y-auto">
                        @foreach($courseVideos as $index => $courseVideo)
                            @if($this->isCurrentVideo($courseVideo))
                                <div>
                                    <div
                                        class="bg-zinc-900 rounded-lg group border-base-300 last:border-b-0 hover:bg-gradient-to-r hover:from-primary/5 hover:to-secondary/5 transition-all duration-300">
                                        <div class="p-4 flex items-center gap-4">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="dark:text-white w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center font-bold text-lg shadow group-hover:scale-110 transition-transform duration-300">
                                                    {{ $index + 1 }}
                                                </div>
                                            </div>

                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <div>
                                                        <flux:heading>{{ $courseVideo->title }}</flux:heading>
                                                        <flux:text size="sm">{{ $courseVideo->description }}</flux:text>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a class="" href="{{ route('page.course-videos', ['course' => $courseVideo->course, 'video' => $courseVideo]) }}">
                                    <div
                                        class="group border-base-300 last:border-b-0 hover:bg-zinc-700 rounded-lg transition-all duration-300">
                                        <div class="p-4 flex items-center gap-4">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="dark:text-white w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center font-bold text-lg shadow transition-transform duration-300">
                                                    {{ $index + 1 }}
                                                </div>
                                            </div>

                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <div>
                                                        <flux:heading>{{ $courseVideo->title }}</flux:heading>
                                                        <flux:text size="sm">{{ $courseVideo->description }}</flux:text>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0">
                                                <button
                                                    class="dark:text-white btn btn-circle border-0 shadow btn-primary btn-sm group-hover:shadow-xl group-hover:scale-110 transition-all duration-300">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 24 24">
                                                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                                           fill="none" stroke="currentColor">
                                                            <path d="M6 3L20 12 6 21 6 3z"></path>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <div class="p-6">
                        <div class="flex gap-3">
                            <flux:button variant="ghost">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Favorite
                            </flux:button>

                            <flux:button variant="ghost">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                Share
                            </flux:button>

                            @if(auth()->user()->watchedVideos()->where('video_id', $video->id)->count())
                                <flux:button class="flex" wire:click="markVideoAsNotCompleted" variant="ghost">
                                    <div class="flex items-center gap-1">
                                        <flux:icon.chevron-down/>
                                        Mark as not completed
                                    </div>
                                </flux:button>
                            @else
                                <flux:button class="flex" wire:click="markVideoAsCompleted" variant="ghost">
                                    <div class="flex items-center gap-1">
                                        <flux:icon.chevron-down/>
                                        Mark as completed
                                    </div>
                                </flux:button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
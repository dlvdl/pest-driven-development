<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class VideoPlayer extends Component
{
    public Video $video;
    public Collection|null $courseVideos;

    public function mount(Video $video)
    {
        $this->courseVideos = $this->video->course->videos;
    }

    public function render(): View
    {
        return view('livewire.video-player');
    }
}

<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class VideoPlayer extends Component
{
    public $video;

    public function mount() {}

    public function render(): View
    {
        return view('livewire.video-player');
    }
}

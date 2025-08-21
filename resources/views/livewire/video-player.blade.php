<div>
    <h1>{{ $video->title }} ({{ $video->getReadableDuration() }}min)</h1>
    <p>{{ $video->description }}</p>

    <iframe src="https://player.vimeo.com/video/{{ $video->vimeo_id }}" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>
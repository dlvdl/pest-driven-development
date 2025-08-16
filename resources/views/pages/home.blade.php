@guest()
    <a href="{{ route('login') }}">Login</a>
@endguest

@auth()
    <form method="post" action="{{route('logout')}}">
        @csrf
        <button type="submit">Log out</button>
    </form>
@endauth

@foreach($courses as $course)
    <h2>{{ $course->title }}</h2>
    <p>{{ $course->description }}</p>
@endforeach
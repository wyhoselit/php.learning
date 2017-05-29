<div class="flex-center">
      <div class="links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('action', ['action' => 'blog']) }}">Blog</a>
        <a href="{{ route('action', ['action' => 'about']) }}">About</a>
        <a href="{{ route('action', ['action' => 'contact']) }}">Contact</a>
          <a href="https://laravel.com/docs">Documentation</a>
          <a href="https://laracasts.com">Laracasts</a>
          <a href="https://laravel-news.com">News</a>
          <a href="https://forge.laravel.com">Forge</a>
          <a href="https://github.com/laravel/laravel">GitHub</a>
      </div>
@if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
@endif
</div>

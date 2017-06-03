<header>
  <nav>
    <ul>
      <li><a href="#">Blog</a></li>
      <li><a href="#">About me</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

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

</header>

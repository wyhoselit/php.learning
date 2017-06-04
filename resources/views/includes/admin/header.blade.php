<header class="top-nav">
  <nav>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Posts</a></li>
      <li><a href="#">Categories</a></li>
      <li><a href="#">Contact Message</a></li>
      <li><a href="#">Logout</a></li>
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

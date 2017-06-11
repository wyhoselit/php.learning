<header class="top-nav">
  <nav>
    <ul>
      <li {{ Request::is('admin')? 'class=active' : '' }}><a href="{{route('admin.index')}}">Dashboard</a></li>
      <li {{ Request::is('admin/blog/post*')? 'class=active' : ''}}><a href="{{route('admin.blog.post.index')}}">Posts</a></li>
      <li {{ Request::is('admin/blog/category*') || Request::is('admin/blog/categories*') ? 'class=active' : '' }}><a href="{{route('admin.blog.categories')}}">Categories</a></li>
      <li {{ Request::is('admin/contact/*')? 'class=active' : '' }}><a href="#">Contact Message</a></li>
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

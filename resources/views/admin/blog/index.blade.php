@extends('layouts.admin.master')

@section('styles')
  <link rel="stylesheet" href="{{URL::to('css/form.css')}}">
@endsection


@section('content')
  <div class="container">
    @include('includes.info-box')
    <section id='post-admin'>
      <a href="{{route('admin.blog.create.post')}}">Create Post</a>
    </section>
    <section class="list">
              <!-- If no posts -->
        @if(count($posts) == 0)
          No Posts

        @else

        <!-- If Posts -->
        @foreach($posts as $post)

            <article class="">
            <div class="post-info">
                <h3>{{$post->title}}</h3>
                <span class="info">{{$post->author}} | {{$post->create_at}}</span>
                <div class="edit">
                  <nav>
                    <ul>
                      <li><a href="#">View Post</a></li>
                      <li><a href="#">Edit</a></li>
                      <li><a href="#" class="danger">Delete</a></li>
                    </ul>
                  </nav>
                </div>
            </div>
            </article>

        @endforeach
        @endif

    </section>
    @if($posts->lastPage() > 1)
    <section class="pagination">
      @if($posts->currentPage()!== 1)
      <a href="{{$posts->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
      @endif

      @if($posts->currentPage()!== $posts->lastPage())
        <a href="{{$posts->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
      @endif
    </section>
    @endif
@endsection

@extends('layouts.master')
@section('title')
  Post Title
@endsection

@section('content')

  <div class="container">

      @include('includes.info-box')
    <article class="blog-post">
      <h3>{{$post->title}}</h3>
      <span class="subtitle">{{$post->author}}| {{$post->created_at}}</span>
      <p>{{$post->body}}</p>
      <a href="#">Back</a>
    </article>
  </div>
@endsection

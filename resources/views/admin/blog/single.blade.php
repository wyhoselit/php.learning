@extends('layouts.admin.master')

@section('styles')
  <link rel="stylesheet" href="{{URL::to('css/form.css')}}">
@endsection

@section('content')
<div class="container">
  @include('includes.info-box')
  <section id="post-admin">
    <a href="{{route('admin.blog.post.edit',['post_id'=>$post->id])}}">Edit Post</a>|
    <a href="{{route('admin.blog.post.delete',['post_id'=>$post->id])}}">Delete Post</a>
  </section>
  <section class="post">
    <h1>{{ $post->title}}</h1>
    <span class="subtitle">{{$post->author}} | {{ $post->created_at}}</span>
    <p>{{$post->body}}</p>
  </section>
</div>
@endsection

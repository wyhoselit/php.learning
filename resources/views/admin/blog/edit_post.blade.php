@extends('layouts.admin.master')

@section('styles')
  <link rel="stylesheet" href="{{URL::to('css/form.css')}}">
@endsection


@section('content')
  <div class="container">
    @include('includes.info-box')
    <form class="" action="{{route('admin.blog.post.update')}}" method="post">
      <div class="input-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{Request::old('title')? Request::old('title'): isset($post) ? $post->title: ''}}" {{ $errors->has('title') ? 'class=has-error' : ''}}>
      </div>
      <div class="input-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="{{Request::old('author')?Request::old('author'):isset($post) ?$post->author: ''}}"  {{$errors->has('author') ? 'class=has-error': ''}}>
      </div>
      <div class="input-group">
        <label for="category_select">Add Categories</label>
        <select id="category_select" name="category_select">
          <!-- Foreach loop for categories -->
          <option value="todoid">todo</option>
        </select>
        <button type="button"class="btn">Add Category</button>
        <div class="added-categories">
          <ul>

          </ul>
        </div>
        <input type="hidden" name="categories" id="categories">
      </div>

      <div class="input-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" rows="12" cols="80"  {{$errors->has('body') ? 'class=has-error': ''}}>{{Request::old('body')?Request::old('body'):isset($post) ?$post->body: ''}}</textarea>
      </div>
      <button type="submit" class="btn" name="Submit">Update Post</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      <input type="hidden" name="post_id" value="{{$post->id}}">
    </form>
  </div>
@endsection

@section('scripts')
 <script type="text/javascript" src="{{ URL::to('js/post.js')}}" >

 </script>
@endsection

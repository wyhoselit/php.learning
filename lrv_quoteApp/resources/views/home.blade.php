@extends('layouts.master')
@section('title')
Quote App Tutorial
@endsection
@section('style')

@endsection



@section('content')
<div class="title m-b-md">
    Latest Quotes
</div>
<section class="quotes">
  <article class="quote">
    <div class="delete">
      <a href="#">X</a>
    </div>
    Quote textarea
    <div class="info">
      Create by <a href="#">user</a> on time
    </div>
  </article>
  pagination
</section>
<section class="edit-quote">
  <h1>Add a Quote</h1>
  <form class="" action="index.html" method="post">
    <div class="input-group">
      <label for="author">Your Name</label>
      <input type="text" name="author" id="author" placeholder="Your Name">
    </div>
    <div class="input-group">
      <label for="quote">Your Quote</label>
      <textarea name="quote" id="quote" placeholder="Quote" rows="8" cols="40"></textarea>
    </div>
    <input type="hidden" name="_token" value="{{Session::token()}}">
    <button type="submit" class="btn" name="submit">Submit Quote</button>
  </form>
</section>
@endsection


@section('script')

@endsection

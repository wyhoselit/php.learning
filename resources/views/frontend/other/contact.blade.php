@extends('layouts.master')
@section('title')
  Contact me
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('css/form.css') }}">
@endsection

@section('content')
  @include('includes.info-box')
  <form  action="index.html" method="post" id="contact-form">
    <div class="input-group">
      <label for="name">Your Name</label>
      <input type="text" name="name" id="name" placeholder="Your Name">
    </div>
    <div class="input-group">
      <label for="email">Your E-mail</label>
      <input type="text" name="email" id="email" placeholder="Your Email">
    </div>

    <div class="input-group">
      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" placeholder="Subject">
    </div>

    <div class="input-group">
    <label for="message">Message</label>
    <textarea name="message" id="message" rows="8" cols="80" placeholder="Message"></textarea>
    </div>
    <button type="submit" name="btn" class="btn">Submit</button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
@endsection

@extends('layouts.master')
@section('content')

  @if (count($errors) > 0)
    <div class="">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
  @endif
  
    <div class="title m-b-md">
      <form class="" action="{{ route('benice') }}" method="post">
        <label for="select-action">Who u are...</label>
        <select class="" id="select-action" name="action">
          <option value="blog">Blog</option>
          <option value="about">About</option>
          <option value="Contact">Contact</option>
        </select>
        <input type="text" name="myname">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" name="button">Action</button>
      </form>
      Hi, Laravel with layout!!
    </div>
    <div class="content">This is my very first Laravel Application
    </div>
    <ul>
      @for($i=0; $i<5;$i++)
        @if($i%2 === 0)
          <li>  Iteration: {{$i+1}}</li>
        @endif
      @endfor
    </ul>
@endsection

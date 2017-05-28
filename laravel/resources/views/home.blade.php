@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
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

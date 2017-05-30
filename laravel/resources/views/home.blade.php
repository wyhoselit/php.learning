@extends('layouts.master')
@section('content')



    <div class="title m-b-md">
      How to save to database.
    </div>
    <div class="content">
      <form class="" action="{{ route('add_action') }}" method="post">

        <label for="actionName">Action Name</label>
        <input type="text" name="name" id="actionName">
        <label for="actionVote">Vote</label>
        <input type="text" name="actionVote" id="actionVote">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" name="button">Add Action</button>
      </form>
        @if (count($errors) > 0)
          <div class="">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
    </div>
    <ul>

      @foreach($actions as $action)
      <li> <a href="{{ route('action',['action'=> strtolower($action->name) ])}}">{{ $action->name }}</a></li>
      @endforeach
    </ul>
    <div class="">
      <p>
        Logs
      </p>
      <ul>
      @foreach($logged_actions as $logged_action)
      <li> {{ $logged_action->action->name }}</li>
        @foreach($logged_action->action->categories as $category)
          <li>{{$category->name}}</li>
        @endforeach
      @endforeach

      </ul>
    </div>
    <ul>
      @for($i=0; $i<5;$i++)
        @if($i%2 === 0)
          <li>  Iteration: {{$i+1}}</li>
        @endif
      @endfor
    </ul>
@endsection

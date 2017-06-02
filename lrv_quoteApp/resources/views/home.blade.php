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
  @if(!empty(Request::segment(1)))
  <section class="filter-bar">
      Filter by "{{Request::segment(1)}}", <a href="{{route('home')}}">Show All</a>
  </section>
  @endif
@for($i=0; $i < count($quotes); $i++)
  <article class="quote {{$i % 3 === 0? 'first-in-line': ($i+1)%3 === 0 ? 'last-in-line': ''}}">
    <div class="delete">
      <a href="{{ route('delete',['quote_id' => $quotes[$i]->id]) }}">X</a>
    </div>
    {{$quotes[$i]->quote}}
    <div class="info">
      Create by <a href="{{ route('home',['author'=> $quotes[$i]->author->name])}}">{{ $quotes[$i]->author->name }}</a> on {{$quotes[$i]->updated_at}}
    </div>
  </article>
@endfor
  pagination
</section>
<section class="edit-quote">
  <h1>Add a Quote</h1>


  <form class="" action="{{ route('create') }}" method="post">
    <div class="input-group">
      <label for="author">Your Name</label>
      <input type="text" name="author" id="author" placeholder="Your Name">
    </div>
    <div class="input-group">
      <label for="quote">Your Quote</label>
      <textarea name="quote" id="quote" placeholder="Quote" rows="8" cols="40"></textarea>
    </div>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    @if( count($errors) > 0)
    <section class="info-box fail">
        @foreach($errors->all() as $error)
          {{ $error }}
          @endforeach
    </section>
    @endif
    @if(Session::has('success'))
    <section class="info-box success">
      {{ Session::get('success') }}
    </section>
    @endif
    <button type="submit" class="btn" name="submit">Submit Quote</button>
  </form>
</section>
@endsection


@section('script')

@endsection

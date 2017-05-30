@extends('layouts.master')
@section('content')
<a href="{{ route('home') }}">Back</a>
<h1>{{ $action }} for {{ $myname === null ? 'osElit': $myname }}!!</h1>
@endsection

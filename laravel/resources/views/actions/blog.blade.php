@extends('layouts.master')
@section('content')

<h1>Blog for {{ $myname === null ? 'osElit': $myname }}!!</h1>
@endsection

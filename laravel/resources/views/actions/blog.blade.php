@extends('layouts.master')
@section('content')
<h1>Blog for {{ $name === null ? 'osElit': $name }}!!</h1>
@endsection

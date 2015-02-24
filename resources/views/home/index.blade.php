@extends('master')

@section('content')

  <h2>Laravel 5.0</h2>
  <p>This is a blog created in laravel 5.0</p>
  @if(Auth::user())
  <p>{{ Auth::user()->name }}</p>
  @endif

@endsection

@extends('master')

@section('content')

  <h2>User Profile</h2>

    <div class="span8">
      <div class="well">
        <legend>{{ $data['user']->name }}</legend>
        <p>{{ $data['user']->email }}</p>
        <p> Rank: {{ $data['user']->rank }}</p>
        <p>{{ $data['user']->city }}</p>
        <p>{{ $data['user']->country }}</p>
        <p>{!! $data['user']->bio !!}</p>
      </div>
    </div>

@endsection

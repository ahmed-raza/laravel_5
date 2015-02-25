@extends('master')

@section('content')

  <h2>User Profile</h2>

  <div class="row">
    <div class="span4">
      <div class="well">
        {!! HTML::linkRoute('profile.edit', '', $data['user']->id, array('class'=>'close icon icon-pencil')) !!}
        <legend>{{ $data['user']->name }}</legend>
        <p>{{ $data['user']->email }}</p>
        <p> Rank: {{ $data['user']->rank }}</p>
        <p>{{ $data['user']->city }}</p>
        <p>{{ $data['user']->country }}</p>
        <p>{!! $data['user']->bio !!}</p>
      </div>
    </div>
  </div>

@endsection

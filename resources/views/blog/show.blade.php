@extends('master')

@section('content')

  <div class="title">
    <h2>{{ $data['post']->title }}</h2>
  </div>
  <div class="submission-info">
    <p>
      Submitted by <i>{{ $data['post']->author }}</i>
    </p>
  </div>
  <div class="field-body">
    <p>{!! $data['post']->body !!}</p>
  </div>

@endsection

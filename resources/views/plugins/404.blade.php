@extends('master')

@section('content')

  <div class="alert alert-warning">
    <h4>Error 404</h4>
    <p>The requested page was not found. Go back to {!!  HTML::link(URL::previous(), 'previous') !!} page.</p>
  </div>

@endsection

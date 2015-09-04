@extends('master')

@section('content')

  <h2>User Profile</h2>

    <div class="span8">
      <div class="well">
        {!! HTML::link('admin/user/'.$data['user']->id.'/edit', '' , array('class'=>'close icon icon-pencil')) !!}
        <legend>{{ $data['user']->name }}</legend>
        <p>{{ $data['user']->email }}</p>
        <p> Rank: {{ $data['user']->rank }}</p>
        <p>{{ $data['user']->city }}</p>
        <p>{{ $data['user']->country }}</p>
        <p>{!! $data['user']->bio !!}</p>
      </div>
    </div>
  @if($data['user']->rank == 'admin')
    <div class="span3">
      <div class="well">
        <legend>Admin Menu</legend>
        <ul>
          <li>{!! HTML::link('admin/posts', "Blog Posts") !!}</li>
          <li>{!! HTML::link('admin/users', "Users") !!}</li>
          <li>{!! HTML::link('admin/config', "Site Configuration") !!}</li>
          <li>{!! HTML::link('admin/mail', "Mail") !!}</li>
        </ul>
      </div>
    </div>
  @endif

@endsection

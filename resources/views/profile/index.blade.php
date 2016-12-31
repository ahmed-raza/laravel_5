@extends('master')

@section('content')

  <h2>User Profile</h2>
  <div class="inner-container">
    <div class="span8">
      <div class="well">
        {!! HTML::linkRoute('profile.edit', '', $data['user']->id, array('class'=>'close icon icon-pencil')) !!}
        <legend>{{ $data['user']->name }}</legend>
        <p>{{ $data['user']->email }}</p>
        @if($data['user']->rank == 'admin')
        <p> Rank: Super Admin</p>
        @elseif($data['user']->rank == 'user')
        <p> Rank: User</p>
        @endif
        <p>{{ $data['user']->city }}</p>
        <p>{{ $data['user']->country }}</p>
        <p>{!! $data['user']->bio !!}</p>
      </div>
    </div>
    <div class="span8">
      <table class="table table-hover">
        <tr>
          <th>Title</th>
          <th>Post Date</th>
        </tr>
      </table>
    </div>
  </div>
  @if($data['user']->rank == 'admin')
  <div class="side-bar">
    <div class="span3">
      <div class="well">
        <legend>Admin Menu</legend>
        <ul class="nav nav-list">
          <li>{!! HTML::link('admin/posts', "Blog Posts") !!}</li>
          <li>{!! HTML::link('admin/users', "Users") !!}</li>
          <li>{!! HTML::link('admin/config', "Site Configuration") !!}</li>
          <li>{!! HTML::link('admin/mail', "Mail") !!}</li>
        </ul>
      </div>
    </div>
  </div>
  @endif

@endsection

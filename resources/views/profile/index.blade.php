@extends('master')

@section('content')

  <h2>User Profile</h2>
  <div class="row">  
    <div class="inner-container">
      <div class="{{ $data['user']->rank == 'admin' ? 'span8' : 'span12' }}">
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
        <table class="table table-hover">
          <tr>
            <th>Title</th>
            <th>Post Date</th>
          </tr>
          @foreach($data['user']->blogs as $blog)
            <tr>
              <td>{!! HTML::link('blog/'.$blog->slug, $blog->title) !!}</td>
              <td>{{ $blog->created_at->diffForHumans() }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    @if($data['user']->rank == 'admin')
    <div class="side-bar">
      <div class="span4">
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
  </div>

@endsection

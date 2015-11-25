@extends('master')

@section('content')

  <div class="hero-unit">
    <h2>{{ $data['page']->title }}</h2>
    <div>{!! $data['page']->body !!}</div>
    <a href="user/login" class="btn btn-large btn-success">Join Us</a>
  </div>
  <div class="recent-blogs">
  <h2>Recent Blogs</h2>
    @foreach($data['blogs'] as $blog)
      <div class="span4 recent-blog">
        <h3 class="title">{!! HTML::link('blog/'.$blog->slug, $blog->title) !!}</h3>
        <div class="body">{!! substr($blog->body, 0, 100).'...' !!}</div>
      </div>
    @endforeach
  </div>

@endsection

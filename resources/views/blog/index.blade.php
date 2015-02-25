@extends('master')

@section('content')

  <h2>Blog</h2>
  <div class="span12">
    <span class="new-blog">
      {!! HTML::linkRoute('blog.create', 'Create a new blog post') !!}
    </span>
  </div>
  <ul class="blogs">
  @foreach($data['blogs'] as $blog)
    <li>
      <h3>{!! HTML::linkRoute('blog.show', substr($blog->title, 0, 20).'...', $blog->slug) !!}</h3>
      <p>{!! substr($blog->body, 0, 100).'...' !!}</p>
    </li>
  @endforeach
  </ul>
@endsection

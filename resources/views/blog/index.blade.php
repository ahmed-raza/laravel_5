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
      <h3 class="blog-title">{!! HTML::linkRoute('blog.show', $blog->title, $blog->slug, array('title'=>"Submitted by: ".$blog->author)) !!}</h3><span class="blog-posted-at">{!! $blog->created_at !!}</span>
      <div class="blog-body">{!! substr($blog->body, 0, 100).'...' !!}</div >
    </li>
  @endforeach
  </ul>
  <div class="pagination">
    {!! $data['blogs']->render() !!}
  </div>
@endsection

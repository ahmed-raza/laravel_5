@extends('master')

@section('content')

  <h2>Blog</h2>
  <div class="row">  
    <div class="span12">
      <span class="new-blog">
        {!! HTML::linkRoute('blog.create', 'Create a new blog post') !!}
      </span>
    </div>
  </div>
  <ul class="blogs">
  @foreach($data['blogs'] as $blog)
    <li>
      <div class="row">
        <div class="span4">
          <div class="img">
            <img src="/img/{{ explode(',', $blog->img_name)[0] }}" class="img img-polaroid img-thumbnail">
          </div>
        </div>
        <div class="span8">
          <h3 class="blog-title">{!! HTML::linkRoute('blog.show', $blog->title, $blog->slug, array('title'=>"Submitted by: ".$blog->user->name)) !!}</h3><span class="blog-posted-at">{!! date('d F, Y', strtotime($blog->created_at)) !!}</span>
          <div class="blog-body">{!! substr($blog->body, 0, 470).'...' !!}</div >
      </div>
      </div>
    </li>
  @endforeach
  </ul>
  <div class="pagination">
    {!! $data['blogs']->render() !!}
  </div>
@endsection

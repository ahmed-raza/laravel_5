@extends('master')

@section('content')
  <div class="blog blog-post-{{ $data['post']->id }} blog-post">
    <div class="title">
      <h2>{!! HTML::linkRoute('blog.show', $data['post']->title, $data['post']->slug, array('title'=>"Submitted by: ".$data['post']->user->name)) !!}</h2>
    </div>
    <div class="submission-info">
      <p>
        Submitted by <i>{{ $data['post']->user->name }}</i>
      </p>
    </div>
    <div class="actions">
      @if($data['username'] == $data['post']->user->name || $data['rank'] == 'admin')
      <span class="edit">{!! HTML::linkRoute('blog.edit', 'Edit', $data['post']->id, array('class'=>'btn btn-mini btn-inverse')) !!}</span>
      <span class="delete">
        {!! Form::open(array('method'=>'DELETE', 'route'=>array('blog.destroy', $data['post']->id))) !!}
        {!! Form::submit('Delete', array('class'=>'btn btn-danger btn-mini')) !!}
        {!! Form::close() !!}
      </span>
      @endif
    </div>
    <div class="field-body">
      <p>{!! $data['post']->body !!}</p>
    </div>
    <div class="field-blog-image yoxview">
      @foreach($data['files'] as $file)
        @if(!empty($file))
          <a href="/img/{{ $file }}"><img src="/img/{{ $file }}" class="img img-polaroid blogimage"></a>
        @endif
      @endforeach
    </div>
  </div>
  <div class="comments-holder">
    @if(Auth::user())
    <div class="comments-form">
      <div class="">
        {!! Form::open(array('route'=>'comment.store')) !!}
        <div class="field-hidden">
          {!! Form::hidden('blog_id', $data['post']->id) !!}
        </div>
        <div class="field-comment">
          {!! Form::label('Comments') !!}
          {!! Form::textarea('comment', '',array('class'=>'comment-body', 'rows'=>'4', 'id'=>'Comments')) !!}
        </div>
        <div class="form-submit">
          {!! Form::submit('Comment', array('class'=>'btn btn-success')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    @endif
    <div class="comments-holder">
      <ul class="comments">
        @foreach($data['comments'] as $comment)
          <li>
            <span class="commenter">
              <strong>{!! $comment->commenter !!}</strong>
              @if(Auth::user() && Auth::user()->name == $comment->commenter)
              <span class="actions">
                <span class="edit">{!! HTML::linkRoute('comment.edit', 'Edit', $comment->id, array('class'=>'btn btn-mini btn-inverse')) !!}</span>
                <span class="btn btn-mini btn-danger">Delete</span>
              </span>
              @endif
            </span>
            <div class="comment">
              {!! $comment->comment !!}
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

@endsection

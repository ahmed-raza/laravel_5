@extends('master')

@section('content')
  <div class="blog blog-{{ $data['post']->id }}">
    <div class="title">
      <h2>{{ $data['post']->title }}</h2>
    </div>
    <div class="submission-info">
      <p>
        Submitted by <i>{{ $data['post']->author }}</i>
      </p>
    </div>
    <div class="actions">
      @if($data['username'] == $data['post']->author)
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
  </div>

  <div class="comments-holder">
    @if(Auth::user())
    <div class="comments-form">
      <div class="span12">
        {!! Form::open(array('route'=>'comment.store')) !!}
        {!! Form::label('Comments') !!}
        {!! Form::textarea('comment', '',array('class'=>'ckeditor')) !!}
        {!! Form::close() !!}
      </div>
    </div>
    @endif
  </div>

@endsection

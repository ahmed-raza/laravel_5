@extends('master')

@section('content')

  <h2>Site home page</h2>

  {!! Form::open(array('url'=>'admin/config/home/store')) !!}
  <div class="span12">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', $data['settings']->title, array('class'=>'input-xlarge','id'=>'title')) !!}
  </div>
  <div class="span12">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', $data['settings']->body, array('class'=>'input-xlarge ckeditor','id'=>'body')) !!}
  </div>
  <div class="span12 form-submit">
    {!! Form::submit('Save', array('class'=>'btn btn-success')) !!}
  </div>
  {!! Form::close() !!}

@endsection

@extends('master')

@section('content')

  <h2>Site home page</h2>

  {!! Form::open(array('url'=>'admin/config/home/store')) !!}
  <div class="span12">
    {!! Form::label('title', 'Title') !!}
    @if(isset($data['settings']))
    {!! Form::text('title', $data['settings']->title, array('class'=>'input-xlarge','id'=>'title')) !!}
    @else
    {!! Form::text('title', '', array('class'=>'input-xlarge','id'=>'title')) !!}
    @endif
  </div>
  <div class="span12">
    {!! Form::label('body', 'Body') !!}
    @if(isset($data['settings']))
      {!! Form::textarea('body', $data['settings']->body ? $data['settings']->body : '', array('class'=>'input-xlarge ckeditor','id'=>'body')) !!}
    @else
      {!! Form::textarea('body', '', array('class'=>'input-xlarge ckeditor','id'=>'body')) !!}
    @endif
  </div>
  <div class="span12 form-submit">
    {!! Form::submit('Save', array('class'=>'btn btn-success')) !!}
  </div>
  {!! Form::close() !!}

@endsection

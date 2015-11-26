@extends('master')

@section('content')

  <h2>New Blog Post</h2>
  <div class="span12">
    {!! Form::open(array('route'=>'blog.store','enctype' => 'multipart/form-data','files'=>true)) !!}
    <div class="span6">
      {!! Form::label('Title') !!}
      {!! Form::text('title', '', array('class'=>'input-xlarge')) !!}
      {!! Form::label('Files') !!}
      {!! Form::file('files[]',  array('class'=>'input-xlarge', 'multiple'=>true)) !!}
    </div>
    <div class="span5">
      {!! Form::label('Description') !!}
      {!! Form::text('description', '', array('class'=>'input-xlarge')) !!}
      {!! Form::label('Keywords') !!}
      {!! Form::text('keywords', '', array('class'=>'input-xlarge')) !!}
    </div>
    <div class="span12">
      {!! Form::label('Body') !!}
      {!! Form::textarea('body', '', array('class'=>'ckeditor')) !!}
    </div>
    <div class="span12 form-submit">
      {!! Form::submit('Post', array('class'=>'btn btn-success')) !!}
    </div>
    {!! Form::close() !!}
  </div>

@endsection

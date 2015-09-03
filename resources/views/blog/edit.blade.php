@extends('master')

@section('content')

  <h2>Edit {{ $data['post']->title }}</h2>
  <div class="span12">
    <div class="form-wrapper form-edit-blog">
      {!! Form::model($data['post'],
      array(
        'method'=>'PATCH',
        'route'=>array(
          'blog.update',
          $data['post']->id
          ),
        'enctype' => 'multipart/form-data','files'=>true)) !!}
      <div class="span6">
        {!! Form::label('Title') !!}
        {!! Form::text('title', $data['post']->title, array('class'=>'input-xlarge')) !!}
        {!! Form::label('Image') !!}
        {!! Form::file('image',  array('class'=>'input-xlarge')) !!}
      </div>
      <div class="span5">
        {!! Form::label('Description') !!}
        {!! Form::text('description', $data['post']->description, array('class'=>'input-xlarge')) !!}
        {!! Form::label('Keywords') !!}
        {!! Form::text('keywords', $data['post']->keywords, array('class'=>'input-xlarge')) !!}
      </div>
      <div class="span12">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', $data['post']->body, array('class'=>'ckeditor')) !!}
      </div>
      <div class="span12 form-submit">
        {!! Form::submit('Edit', array('class'=>'btn btn-warning')) !!}
      </div>
      <div class="span12 form-cancel form-submit">
        {!! HTML::linkRoute('blog.show', 'Cancel', $data['post']->slug, array('class'=>'btn btn-success')) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>

@endsection

@extends('master')

@section('content')

  <h2>Send a Mail</h2>
  {!! Form::open(array('url'=>'admin/mail/send')) !!}

    {!! Form::label('send-to', 'To') !!}
    {!! Form::text('send-to', null, array('class'=>'span4')) !!}

    {!! Form::label('subject', 'Subject') !!}
    {!! Form::text('subject', null, array('class'=>'span4')) !!}

    {!! Form::label('message', 'Message') !!}
    {!! Form::textarea('message', null, array('class'=>'span12 ckeditor')) !!}

    {!! Form::submit('Send', array('class'=>'btn btn-success span4')) !!}
  {!! Form::close() !!}

@endsection

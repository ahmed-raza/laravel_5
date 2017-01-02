@extends('master')

@section('content')

  {!! Form::open(array('url'=>'admin/test_post','method'=>'POST', 'id'=>'myform')) !!}
  <p>{!! Form::text('hello', '', array('placeholder'=>'Test', 'id'=>'hello')) !!}<span id="error"></span></p>
  <p>{!! Form::submit('Submit', array('class'=>'btn btn-success')) !!}</p>
  {!! Form::close() !!}

@endsection

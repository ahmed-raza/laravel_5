@extends('master')

@section('content')

  {!! Form::open(array('url'=>'admin/test_post','method'=>'POST', 'id'=>'myform')) !!}
  {!! Form::text('hello', 'Test', array('placeholder'=>'Test', 'id'=>'hello')) !!}
  {!! Form::submit('Submit', array('class'=>'btn btn-success')) !!}
  {!! Form::close() !!}

@endsection

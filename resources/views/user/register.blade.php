@extends('master')

@section('content')

  <h2>User Account</h2>

  <div class="row">
    <div class="span4 offset4">
      <div class="well">
        <legend>Register</legend>
        {!! Form::open(array('url'=>'user/register/me')) !!}
        {!! Form::label('Username') !!}
        {!! Form::text('name', '', array('class'=>'input-large')) !!}
        {!! Form::label('Email') !!}
        {!! Form::text('email', '', array('class'=>'input-large')) !!}
        {!! Form::label('Password') !!}
        {!! Form::password('password', array('class'=>'input-large')) !!}
        {!! Form::label('Confirm Password') !!}
        {!! Form::password('password_confirmation', array('class'=>'input-large')) !!}
        {!! Form::submit('Register', array('class'=>'btn btn-success')) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection

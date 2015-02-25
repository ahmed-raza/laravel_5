@extends('master')

@section('content')

  <h2>User Account</h2>

  <div class="row">
    <div class="span4 offset4">
      <div class="well">
        <legend>Login</legend>
        {!! Form::open(array('url'=>'user/login/me')) !!}
        {!! Form::label('Email') !!}
        {!! Form::text('email', '', array('class'=>'input-large')) !!}
        {!! Form::label('Password') !!}
        {!! Form::password('password', array('class'=>'input-large')) !!}
        {!! Form::submit('Login', array('class'=>'btn btn-success')) !!}
        {!! HTML::link('user/register', 'Register', array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection

@extends('master')

@section('content')

  <h2>Edit {{ $data['user']->name }}</h2>
  {!! Form::open(array('method'=>'PATCH', 'route'=>array('profile.update', $data['user']->id))) !!}
  <div class="span6">
    {!! Form::label('Username') !!}
    {!! Form::text('name', $data['user']->name, array('class'=>'input-xlarge')) !!}
    {!! Form::label('Email') !!}
    {!! Form::text('email', $data['user']->email, array('class'=>'input-xlarge', 'disabled')) !!}
    {!! Form::label('Rank') !!}
    {!! Form::text('rank', $data['user']->rank, array('class'=>'input-xlarge', 'disabled')) !!}
    {!! Form::label('Current Password*') !!}
    {!! Form::password('password', array('class'=>'input-xlarge')) !!}
  </div>
  <div class="span5">
    {!! Form::label('City') !!}
    {!! Form::text('city', $data['user']->city, array('class'=>'input-xlarge')) !!}
    {!! Form::label('Country') !!}
    {!! Form::text('country', $data['user']->country, array('class'=>'input-xlarge')) !!}
    {!! Form::label('New Password') !!}
    {!! Form::password('new_password', array('class'=>'input-xlarge')) !!}
    {!! Form::label('Confirm Password') !!}
    {!! Form::password('password_confirmation', array('class'=>'input-xlarge')) !!}
  </div>
  <div class="span12">
    {!! Form::label('Bio*') !!}
    {!! Form::textarea('bio', $data['user']->bio, array('class'=>'ckeditor')) !!}
  </div>
  <div class="span12 form-submit">
    {!! Form::submit('Update', array('class'=>'btn btn-warning')) !!}
  </div>
  {!! Form::close() !!}

@endsection

@extends('master')

@section('content')

  <div class="alert alert-danger">
    <h4 class="alert-heading">Warning!</h4>
    <p>Are you sure you want to delete this user? Everything related to this user will be deleted and cannot be recovered!</p>
    {!! Form::open(array('method'=>'DELETE', 'route'=>array('admin.user.destroy', $data['user']->id))) !!}
    {!! Form::submit('Yes', array('class'=>'btn btn-danger')) !!}
    {!! HTML::link(URL::previous(), 'No', array('class'=>'btn btn-success')) !!}
    {!! Form::close() !!}
  </div>

@endsection

@extends('master')

@section('content')

  <h2>Site configuration</h2>
  <p>Here you can manage different sections of your site.</p>
  <ul class="nav nav-list">
    <li><a href="{{ url('admin/config/home') }}"><i class="icon icon-home"></i>Home</a></li>
    <li><a href="{{ url('admin/users') }}"><i class="icon icon-user"></i>Users</a></li>
    <li><a href="{{ url('admin/posts') }}"><i class="icon icon-edit"></i>Blogs</a></li>
    <li><a href="{{ url('admin/mail') }}"><i class="icon icon-envelope"></i>Mail</a></li>
    <li><a href="{{ url('admin/footer') }}"><i class="icon icon-arrow-down"></i>footer</a></li>
  </ul>

@endsection

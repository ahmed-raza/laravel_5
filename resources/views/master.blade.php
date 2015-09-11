<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $data['title'] }}</title>
  {!! HTML::style('css/bootstrap.css') !!}
  {!! HTML::style('css/bootstrap.min.css') !!}
  {!! HTML::style('css/style.css') !!}
  {!! HTML::script('js/jquery-2.1.1.js') !!}
  {!! HTML::script('js/jquery-1.10.1.min.js') !!}
  {!! HTML::script('js/bootstrap.js') !!}
  {!! HTML::script('ckeditor-full/ckeditor.js') !!}
  {!! HTML::script('yoxview/yoxview-init.js') !!}
  <script>CKEDITOR.replace('content');</script>
  {!! HTML::script('js/test.jquery.js') !!}
</head>
<body class="{{ $data['classes'] }}">
<div class="main-container">
  <div class="header">
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">{!! HTML::link('/', 'Home') !!}</li>
            <li class="{{ Request::is('blog') ? 'active' : '' }}">{!! HTML::link('blog', 'Blog') !!}</li>
            @if(Auth::user())
            <li class="{{ Request::is('profile') ? 'active' : '' }}">{!! HTML::link('profile', 'Profile') !!}</li>
            @if(Auth::user()->rank == 'admin')
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-th-large"></i> Admin
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu navbar-inverse">
                <li><a href="{{ url('admin/users') }}"><i class="icon icon-user"></i> Users</a></li>
                <li><a href="{{ url('admin/posts') }}"><i class="icon icon-list-alt"></i> Blog Posts</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('admin/config') }}"><i class="icon icon-wrench"></i> Site Configuration</a></li>
                <li><a href="{{ url('admin/mail') }}"><i class="icon icon-envelope"></i> Send Mail</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('user/logout') }}"><i class="icon icon-off"></i> Logout</a></li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->rank != 'admin')
            <li>{!! HTML::link('user/logout', 'Logout') !!}</li>
            @endif
            @else
            <li class="{{ Request::is('user/login') ? 'active' : '' }}">{!! HTML::link('user/login', 'Login') !!}</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
      <div class="hidden-forms">
        <div class="alert alert-danger">Are you sure you wan't to carry out the operation?</div>
        @if(isset($comment))
        {!! Form::open(array('method'=>'DELETE', 'route'=>array('comment.destroy', $comment->id))) !!}
        {!! Form::submit('Delete', array('class'=>'btn btn-danger btn-mini')) !!}
        {!! Form::close() !!}
        @endif
      </div>
      @include('plugins.errors')
      @include('plugins.message')
      @yield('content')
    </div>
  </div>
    <div class="footer">
      <div class="container">
        <div class="rights">
          <p>Developed by Ahmed Raza. Powered by Laravel 5.0, All rights reserved 2015.</p>
        </div>
      </div>
    </div>
</body>
</html>

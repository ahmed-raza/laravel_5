<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $data['title'] }}</title>
  {!! HTML::style('css/bootstrap.css') !!}
  {!! HTML::style('css/style.css') !!}
  {!! HTML::script('js/jquery-2.1.1.js') !!}
  {!! HTML::script('js/bootstrap.min.js') !!}
  {!! HTML::script('js/bootstrap.js') !!}
  {!! HTML::script('ckeditor-full/ckeditor.js') !!}
  {!! HTML::script('yoxview/yoxview-init.js') !!}
  <script>CKEDITOR.replace('content');</script>
  {!! HTML::script('js/test.jquery.js') !!}
</head>
<body>
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
      <ul class="nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}">{!! HTML::link('/', 'Home') !!}</li>
        <li class="{{ Request::is('blog') ? 'active' : '' }}">{!! HTML::link('blog', 'Blog') !!}</li>
        @if(Auth::user())
        <li class="{{ Request::is('profile') ? 'active' : '' }}">{!! HTML::link('profile', 'Profile') !!}</li>
        <li>{!! HTML::link('user/logout', 'Logout') !!}</li>
        @else
        <li class="{{ Request::is('user/login') ? 'active' : '' }}">{!! HTML::link('user/login', 'Login') !!}</li>
        @endif
      </ul>
    </div>
  </div>
  <div class="main-wrapper">
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
    <div class="footer">
      <div class="rights">
        <p>Developed by Ahmed Raza. Powered by Laravel 5.0, All rights reserved 2015.</p>
      </div>
    </div>
  </div>
</body>
</html>

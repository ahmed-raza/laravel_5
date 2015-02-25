<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $data['title'] }}</title>
  {!! HTML::style('css/bootstrap.css') !!}
  {!! HTML::style('css/style.css') !!}
  {!! HTML::script('js/bootstrap.js') !!}
  {!! HTML::script('ckeditor/ckeditor.js') !!}
  <script>CKEDITOR.replace('content');</script>
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li>{!! HTML::link('/', 'Home') !!}</li>
        <li>{!! HTML::link('blog', 'Blog') !!}</li>
        @if(Auth::user())
        <li>{!! HTML::link('profile', 'Profile') !!}</li>
        <li>{!! HTML::link('user/logout', 'Logout') !!}</li>
        @else
        <li>{!! HTML::link('user/login', 'Login') !!}</li>
        @endif
      </ul>
    </div>
  </div>
  <div class="container">
    @include('plugins.errors')
    @if(Session::has('message'))
    <div class="alert alert-success">
      <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    @yield('content')
  </div>
</body>
</html>

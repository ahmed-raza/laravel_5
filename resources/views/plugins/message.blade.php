@if(Session::has('message'))
<div class="alert alert-success">
  <a class="close" href="#" data-dismiss="alert">x</a>
  <h4 class="alert-heading">Success!</h4>
  <ul>
    <li>{{ Session::get('message') }}</li>
  </ul>
</div>
@endif

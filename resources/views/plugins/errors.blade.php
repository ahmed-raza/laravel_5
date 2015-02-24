@if($errors->has())
<div class="alert alert-danger">
  <a class="close" href="#" data-dismiss="alert">x</a>
  <h4 class="alert-heading">Uh Oh!</h4>
  <ul>
    @foreach ($errors->all() as $message)
    <li>{{ $message }}</li>
    @endforeach
  </ul>
</div>
@endif

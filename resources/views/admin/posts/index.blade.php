@extends('master')

@section('content')

  <h2>Site Posts</h2>
  @if(!empty($data['posts']))
    <table class="table table-hover">
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Actions</th>
      </tr>
      @foreach($data['posts'] as $post)
        <tr>
          <td>{{ $user->title }}</td>
          <td>{{ $user->author }}</td>
          <td>{{ $user->created_at }}</td>
        </tr>
      @endforeach
    </table>
  @endif

@endsection

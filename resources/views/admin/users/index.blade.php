@extends('master')

@section('content')

  <h2>Site Users</h2>
  <table class="table table-hover">
    <tr>
      <th>Username</th>
      <th>Rank</th>
      <th>Actions</th>
    </tr>
    @foreach($data['users'] as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->rank }}</td>
        <td>{{ $user->updated_at }}</td>
      </tr>
    @endforeach
  </table>

@endsection

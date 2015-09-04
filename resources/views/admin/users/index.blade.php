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
        <td>
          {!! HTML::link('admin/user/'.$user->id, 'View') !!}
          {!! HTML::link('admin/user/'.$user->id.'/edit', 'Edit') !!}
          {!! HTML::link('admin/user/'.$user->id.'/delete', 'Delete') !!}
        </td>
      </tr>
    @endforeach
  </table>

@endsection

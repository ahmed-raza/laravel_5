@extends('master')

@section('content')

  <h2>Site Posts</h2>
  @if(!empty($data['posts']))
    <table class="table table-hover">
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Post Date</th>
        <th>Actions</th>
      </tr>
      @foreach($data['posts'] as $post)
        <tr>
          <td>{!! HTML::linkRoute('blog.show', $post->title, $post->slug)  !!}</td>
          <td>{{ $post->user->name }}</td>
          <td>{{ $post->created_at }}</td>
          <td>
            {!! HTML::linkRoute('blog.show', 'View', $post->slug) !!}
            {!! HTML::linkRoute('blog.edit', 'Edit', $post->id) !!}
            {!! HTML::linkRoute('blog.delete', 'Delete', $post->id) !!}
          </td>
        </tr>
      @endforeach
    </table>
  @endif

@endsection

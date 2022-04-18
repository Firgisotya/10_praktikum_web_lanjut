@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Featured Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <th>{{ $article->title }}</th>
                    <td>{{ $article->content }}</td>
                    <td><img width="100px" height="100px" src="{{asset('storage/'.$article->featured_image)}}"></td>
                    <td><a class="btn btn-primary" href="/articles/{{ $article->id }}/edit">Edit</a></td>
                  </tr>
                @endforeach

            </tbody>
          </table>
    </div>
@endsection

@extends('layout')

@section('title', 'Trang danh sách bài viết')

@section('content')
    <h1>Đây là nội dung</h1>
    <hr>
    @foreach ($posts as $post)
        <div>
            <a href="#">
                <h2>{{ $post->title }}</h2>
            </a>
            <p>{{ $post->description }}</p>
        </div>
    @endforeach
@endsection

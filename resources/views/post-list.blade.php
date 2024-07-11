@extends('layout')

@section('title', 'Trang danh sách bài viết')

@section('content')
    <h1>Đây là nội dung</h1>
    <hr>
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.detail', $post->id) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <p>{{ $post->description }}</p>
            <p>Lượt xem: {{ $post->view }}</p>
        </div>
    @endforeach
@endsection

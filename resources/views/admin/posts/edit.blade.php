<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-50">
        <h1>Update Post</h1>
        <a href="{{ route('post.index') }}" class="btn btn-primary">List post</a>

        <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
            @if (session('message'))
                <div class="alert alert-success mt-2">
                    {{ session('message') }}
                </div>
            @endif

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">image</label>
                <input class="form-control" type="file" name="image">
                <br>
                <img src="{{ asset('/storage/' . $post->image) }}" width="60" alt="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" name="content" rows="6">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">View</label>
                <input type="number" name="view" value="{{ $post->view }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="cate_id" id="" class="form-select">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @if ($post->cate_id == $cate->id) selected @endif>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>

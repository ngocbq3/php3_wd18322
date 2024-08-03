<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-50">
        <h1>Create new Post</h1>
        <a href="{{ route('post.index') }}" class="btn btn-primary">List post</a>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" name="content" rows="6">{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">View</label>
                <input type="number" name="view" class="form-control" value="{{ old('view') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="cate_id" id="" class="form-select">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id == old('cate_id'))>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create new</button>
            </div>
        </form>
    </div>
</body>

</html>

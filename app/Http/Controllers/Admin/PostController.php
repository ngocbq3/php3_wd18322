<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        //Lấy toàn bộ dữ liệu bảng posts
        // $posts = Post::all();

        //Lấy 1 bản ghi
        // $posts = Post::all()->first();

        //Lấy dữ liệu theo điều kiên
        // $posts = Post::query()->where('cate_id', 1)->get();
        //Tìm kiếm gần đúng
        // $posts = Post::query()
        //     ->where('title', 'LIKE', '%aut%')
        //     ->get();
        //Các hàm sum, count, avg, ..

        // $sum = Post::query()->sum('view');
        // echo $sum;

        //Thêm dữ liệu
        //1. sử dụng mảng
        // $data = [
        //     'title' => fake()->text(25),
        //     'image' => fake()->imageUrl(),
        //     'description' => fake()->text(30),
        //     'content' => fake()->paragraph(),
        //     'view' => rand(10, 1000),
        //     'cate_id' => rand(1, 4)
        // ];
        // Post::query()->create($data);
        //2. sử dụng đối tượng
        // $post = new Post();
        // $post->title = fake()->text(25);
        // $post->image = fake()->imageUrl();
        // $post->description = fake()->text(25);
        // $post->content = fake()->text(25);
        // $post->view = rand(10, 1000);
        // $post->cate_id = rand(1, 4);
        // $post->save();

        // Post::query()->find(102)->update([
        //     'title' => 'Update post'
        // ]);
        Post::query()->find(101)->delete();
        $posts = Post::orderByDesc('id')->get();
        return $posts;
    }
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts', compact('posts'));
    }

    //Hiển thị form create post
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    //Lưu dữ liệu được thêm vào database
    public function store(Request $request)
    {
        $data = $request->except('image'); //hàm except loại bỏ key image
        $data['image'] = "";
        if ($request->hasFile('image')) {
            //Upload file
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        //create data
        Post::query()->create($data);

        //quay lại trang danh sách khi thêm thành công
        return redirect()->route('post.index')->with('message', 'Thêm dữ liệu thành công');
    }

    //xóa dữ liệu
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Xóa dữ liệu thành công');
    }

    //hiển thị form edit
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    //Cập nhật dữ liệu
    public function update(Request $request, Post $post)
    {
        $data = $request->except('image');
        $old_image = $post->image;
        //Không cập nhật ảnh
        $data['image'] = $old_image;
        //Cập nhật ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }

        //Cập nhật lên database
        $post->update($data);

        if (isset($path_image)) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
        }

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }
}

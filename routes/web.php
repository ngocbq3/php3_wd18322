<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

// Route::view('/about-us', 'about')->name('page.about');
// //Đường dẫn có tham số
// Route::get('/product/{id}', function ($id) {
//     return "Product id: $id";
// })->where('id', '[0-9]+');
// Route::get(
//     '/users/{id}/comment/{comment_id?}',
//     function ($id, $comment_id = null) {
//         return "Product ID: $id - Comment Id: $comment_id";
//     }
// );

// //Nhóm các đường dẫn có tiền tố giống nhau
// Route::prefix('admin')->group(function () {
//     Route::get('/product', function () {
//         return "PRODUCT";
//     });

//     Route::get('/users', function () {
//         return "USERS";
//     });
// });


// //Sử dụng query builder
// Route::get('/posts', function () {
//     //Lấy dữ liệu từ bảng posts
//     // $posts = DB::table('posts')->limit(10)->get();
//     //Lấy dữ liệu theo cột chỉ định

//     //Cập nhật
//     // DB::table('posts')
//     //     ->where('id', '=', 2)
//     //     ->update(
//     //         ['title' => 'Dữ liệu được cập nhật']
//     //     );
//     //Xóa dữ liệu
//     // DB::table('posts')->delete(9);

//     // $posts = DB::table('posts')
//     //     ->select('id', 'title', 'view')
//     //     ->where('view', '>', 800) //Lọc các bài viết có view > 800
//     //     ->get();

//     //Join 2 bảng posts và categories
//     $posts = DB::table('posts')
//         ->join('categories', 'cate_id', '=', 'categories.id')
//         ->get();
//     return $posts;
// });

// Route::get('/post-list', function () {
//     $posts = DB::table('posts')->get();
//     return view('post-list', compact('posts'));
// });

// Route::get('/', function () {
//     $posts = DB::table('posts')
//         ->orderBy('view', 'desc')
//         ->limit(8)
//         ->get();
//     return view('post-list', compact('posts'));
// });

//Hiển bài viết theo danh mục
// Route::get('/category/{id}', function ($id) {
//     $posts = DB::table('posts')
//         ->where('cate_id', '=', $id)
//         ->get();
//     return view('post-list', compact('posts'));
// });

//Hiển thị chi tiết bài viết
// Route::get('/post/{id}', function ($id) {
//     $post = DB::table('posts')
//         ->where('id', $id)
//         ->first();
//     return $post;
// })->name('post.detail');

// Route::prefix('category')->group(function () {
//     Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
// });

Route::get('/test', [PostController::class, 'test']);
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

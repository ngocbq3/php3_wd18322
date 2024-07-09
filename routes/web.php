<?php

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

Route::get('/', function () {
    return view('home');
});

Route::view('/about-us', 'about')->name('page.about');
//Đường dẫn có tham số
Route::get('/product/{id}', function ($id) {
    return "Product id: $id";
})->where('id', '[0-9]+');
Route::get(
    '/users/{id}/comment/{comment_id?}',
    function ($id, $comment_id = null) {
        return "Product ID: $id - Comment Id: $comment_id";
    }
);

//Nhóm các đường dẫn có tiền tố giống nhau
Route::prefix('admin')->group(function () {
    Route::get('/product', function () {
        return "PRODUCT";
    });

    Route::get('/users', function () {
        return "USERS";
    });
});

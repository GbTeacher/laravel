<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminParserController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/json', function () {
    return Response::json([
        'status' => true,
        'data'   => [
            'title' => 'News title',
            'text'  => 'News text',
        ],
    ]);
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/category', [CategoryController::class, 'all'])->name('category');
Route::get('/news/category/{categoryId}', [NewsController::class, 'allByCategory'])->name('category.news');
Route::get('/news/{id}', [NewsController::class, 'one'])->name('news.id');

Route::prefix('/feedback')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/store', [FeedbackController::class, 'store'])->name('feedback.store');
});

Route::prefix('/order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order');
    Route::post('/store', [OrderController::class, 'store'])->name('order.store');
});

Route::get('/auth/vk', [SocialController::class, 'loginVk'])->name('login.vk');
Route::get('/auth/vk/response', [SocialController::class, 'responseVk'])->name('response.vk');

Route::get('/auth/facebook', [SocialController::class, 'loginFacebook'])->name('login.facebook');
Route::get('/auth/facebook/response', [SocialController::class, 'responseFacebook'])->name('response.facebook');


Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/parser', [AdminParserController::class, 'index'])->name('parser');
    Route::post('/parser/parse', [AdminParserController::class, 'parse'])->name('parser.parse');

    Route::resource('news', AdminNewsController::class);
    Route::resource('feedback', AdminFeedbackController::class)->except(['store']);
    Route::resource('order', AdminOrderController::class)->except(['store']);

    Route::middleware('is.admin')->group(function () {
        Route::resource('user', AdminUserController::class);
        Route::get('user/pwd/{user}', [AdminUserController::class, 'password'])->name('user.password');
        Route::post('user/pwd/update/{user}', [AdminUserController::class, 'passwordUpdate'])->name('user.password.update');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

Auth::routes(['register' => false]);

<?php

use App\Http\Controllers\InvokeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "Hello from home!";
})->name('home');

Route::get('/news', [NewsController::class, 'all'])->name('news');

Route::get('/news/{id}', [NewsController::class, 'one'])->name('news.id');

//Route::resource('resource', ResourceController::class)->only([
//    'index', 'show'
//]);
//
//Route::resource('resource', ResourceController::class)->except([
//    'index', 'show'
//]);

//Route::prefix('admin')->group(function () {
//    Route::get('/', function () {
//        echo 'Admin';
//    });
//
//    Route::get('/panel', function () {
//        echo 'Admin Panel';
//    });
//});

//Route::namespace()
//Route::name('admin.')->group(function () {
//    Route::get('/', function () {
//        echo 'Admin';
//    })->name('index'); //admin.index
//});
//$url = \route('home');

//Route::get($uri, $callback);
//Route::post($uri, $callback);
//Route::put($uri, $callback);
//Route::patch($uri, $callback);
//Route::delete($uri, $callback);
//Route::options($uri, $callback);

//Route::match(['get', 'post'], '/match', function () {});
//Route::any('/', function () {});

//Route::view('/', 'welcome');

//Route::get('/news/{id?}', function ($id) {
//    echo $id;
//});

//Route::fallback(function () {
//    echo 'NOPE!';
//});


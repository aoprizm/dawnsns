<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/', 'Auth\LoginController@login');
Route::post('/', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::get('/follows','PostController@');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/logout','Auth\LoginController@logout');

//投稿した時
Route::post('/post/create', 'PostsController@createForm');

//投稿を削除した時
Route::get('/post/{id}/delete', 'PostsController@delete');

//投稿を編集した時
Route::post('/post/update', 'PostsController@update');

//検索
Route::post('/search', 'UsersController@result');

//フォローしたら
Route::post('/follow/create', 'FollowsController@create');
Route::post('/follow/delete', 'FollowsController@delete');

//プロフィールを編集したら
Route::post('/profile/update', 'UsersController@update');

Route::get('/list/{id}', 'UsersController@show');

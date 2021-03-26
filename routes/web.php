<?php

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

Route::get('/home', 'ArticleController@viewAll')->name('home');

Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/register', 'AuthController@postRegister');

Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postLogin');

Route::post('/logout', 'AuthController@getLogout')->name('logout');

Route::get('/category/{id}', 'CategoryController@view')->name('category')->middleware('guest');

Route::get('/article/{id}', 'ArticleController@view')->name('article');

Route::get('/update', 'AuthController@getUpdate')->name('update')->middleware('user');
Route::post('/update', 'AuthController@postUpdate');

Route::get('/blog', 'UserController@getBlog')->name('blog')->middleware('user');
Route::get('/allblogs', 'UserController@getallBlogs')->name('allblog')->middleware('admin');

Route::post('/bdelete/{id}', 'UserController@deleteArticle')->name('deletearticle');

Route::get('/create', 'UserController@getRegister')->name('registerblog')->middleware('user');
Route::post('/create', 'UserController@postRegister');

Route::get('/user', 'UserController@getUser')->name('user')->middleware('admin');
Route::get('/admin', 'UserController@getAdmin')->name('admin')->middleware('admin');
Route::post('/udelete/{id}', 'UserController@deleteUser')->name('deleteuser');

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adminhome', 'Admin\AdminController@index')->name('adminhome')->middleware('authenticateAdmin');

//user
Route::get('/adminhome/show_user', 'Admin\AdminController@show_user')->name('show_user')->middleware('authenticateAdmin');

//categories
Route::get('/adminhome/show_category', 'Admin\AdminController@show_category')->name('show_category')->middleware('authenticateAdmin');
Route::post('/adminhome/show_category', 'Admin\AdminController@add_category')->name('add_category')->middleware('authenticateAdmin');
Route::delete('/adminhome/show_category', 'Admin\AdminController@del_category')->name('del_category')->middleware('authenticateAdmin');

Route::get('/userhome', 'User\UserController@index')->name('userhome')->middleware('authenticateUser');

Route::get('/userhome/contact', 'User\ContactController@index')->name('contact')->middleware('authenticateUser');;

Route::get('/userhome/about', 'User\AboutController@index')->name('about')->middleware('authenticateUser');;

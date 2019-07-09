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
Route::get('/adminhome/show_user', 'Admin\UserController@show_user')->name('show_user')->middleware('authenticateAdmin');
Route::post('/adminhome/add_user', 'Admin\UserController@add_user')->name('add_user')->middleware('authenticateAdmin');
Route::post('/adminhome/update_user', 'Admin\UserController@update_user_view_page')->name('update_user_page')->middleware('authenticateAdmin');
Route::put('/adminhome/update_user', 'Admin\UserController@update_user')->name('update_user')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_user', 'Admin\UserController@del_user')->name('del_user')->middleware('authenticateAdmin');

//categories
Route::get('/adminhome/show_category', 'Admin\CategoryController@show_category')->name('show_category')->middleware('authenticateAdmin');
Route::post('/adminhome/add_category', 'Admin\CategoryController@add_category')->name('add_category')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_category', 'Admin\CategoryController@del_category')->name('del_category')->middleware('authenticateAdmin');

//color
Route::get('/adminhome/show_color', 'Admin\ColorController@show_color')->name('show_color')->middleware('authenticateAdmin');
Route::post('/adminhome/add_color', 'Admin\ColorController@add_color')->name('add_color')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_color', 'Admin\ColorController@del_color')->name('del_color')->middleware('authenticateAdmin');

//design
Route::get('/adminhome/show_design', 'Admin\DesignController@show_design')->name('show_design')->middleware('authenticateAdmin');
Route::post('/adminhome/add_design', 'Admin\DesignController@add_design')->name('add_design')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_design', 'Admin\DesignController@del_design')->name('del_design')->middleware('authenticateAdmin');

//product
Route::get('/adminhome/show_product', 'Admin\ProductController@show_product')->name('show_product')->middleware('authenticateAdmin');
Route::get('/adminhome/add_product_view_page', 'Admin\ProductController@add_product_view_page')->name('add_product_view_page')->middleware('authenticateAdmin');
Route::post('/adminhome/add_product', 'Admin\ProductController@add_product')->name('add_product')->middleware('authenticateAdmin');
Route::post('/adminhome/update_product', 'Admin\ProductController@update_product_view_page')->name('update_product_page')->middleware('authenticateAdmin');
Route::put('/adminhome/update_product', 'Admin\ProductController@update_product')->name('update_product')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_product', 'Admin\ProductController@del_product')->name('del_product')->middleware('authenticateAdmin');

Route::get('/userhome', 'User\UserController@index')->name('userhome')->middleware('authenticateUser');

Route::get('/userhome/contact', 'User\ContactController@index')->name('contact')->middleware('authenticateUser');;

Route::get('/userhome/about', 'User\AboutController@index')->name('about')->middleware('authenticateUser');;

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

// ================================Admin================================
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
//sales
Route::get('/adminhome/show_sales', 'Admin\SalesController@show_sales')->name('show_sales')->middleware('authenticateAdmin');
Route::post('/adminhome/update_sales', 'Admin\SalesController@update_sales_view_page')->name('update_sales_page')->middleware('authenticateAdmin');
Route::put('/adminhome/update_sales', 'Admin\SalesController@update_sales')->name('update_sales')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_sales', 'Admin\SalesController@del_sales')->name('del_sales')->middleware('authenticateAdmin');
//supplier
Route::get('/adminhome/show_supplier', 'Admin\SupplierController@show_supplier')->name('show_supplier')->middleware('authenticateAdmin');
Route::get('/adminhome/add_supplier_view_page', 'Admin\SupplierController@add_supplier_view_page')->name('add_supplier_view_page')->middleware('authenticateAdmin');
Route::post('/adminhome/add_supplier', 'Admin\SupplierController@add_supplier')->name('add_supplier')->middleware('authenticateAdmin');
Route::post('/adminhome/update_supplier', 'Admin\SupplierController@update_supplier_view_page')->name('update_supplier_page')->middleware('authenticateAdmin');
Route::put('/adminhome/update_supplier', 'Admin\SupplierController@update_supplier')->name('update_supplier')->middleware('authenticateAdmin');
Route::delete('/adminhome/del_supplier', 'Admin\SupplierController@del_supplier')->name('del_supplier')->middleware('authenticateAdmin');
// stock
Route::get('/adminhome/show_stock', 'Admin\StockController@show_stock')->name('show_stock')->middleware('authenticateAdmin');
Route::get('/adminhome/show_out_stock', 'Admin\StockController@show_out_stock')->name('show_out_stock')->middleware('authenticateAdmin');
// Report
Route::get('/adminhome/show_report', 'Admin\ReportController@show_report')->name('show_report')->middleware('authenticateAdmin');
Route::get('/adminhome/users_pdf', 'Admin\ReportController@users_pdf')->name('users_pdf')->middleware('authenticateAdmin');
Route::get('/adminhome/users_excel', 'Admin\ReportController@users_excel')->name('users_excel')->middleware('authenticateAdmin');


// ================================User================================
// index
Route::get('/userhome', 'User\UserController@index')->name('userhome')->middleware('authenticateUser');
// ProductDetails
Route::post('/userhome/product_detail', 'User\ProductDetailController@product_detail')->name('product_detail')->middleware('authenticateUser');
Route::post('/userhome/product_add_to_cart', 'User\ProductDetailController@product_add_to_cart')->name('product_add_to_cart')->middleware('authenticateUser');
// Shopping Cart
Route::get('/userhome/shoping_cart', 'User\ShoppingController@shoping_cart')->name('shoping_cart')->middleware('authenticateUser');
Route::post('/userhome/checkout', 'User\ShoppingController@checkout')->name('checkout')->middleware('authenticateUser');
Route::post('/userhome/product_remove_from_cart', 'User\ShoppingController@product_remove_from_cart')->name('product_remove_from_cart')->middleware('authenticateUser');
// profile
Route::get('/userhome/my_account/show_myaccount', 'User\MyAccountController@show_myaccount')->name('show_myaccount')->middleware('authenticateUser');
Route::post('/userhome/my_account/edit_profile', 'User\MyAccountController@edit_profile')->name('edit_profile')->middleware('authenticateUser');
Route::get('/userhome/my_account/show_change_pass', 'User\MyAccountController@show_change_pass')->name('show_change_pass')->middleware('authenticateUser');
Route::post('/userhome/my_account/edit_password', 'User\MyAccountController@edit_password')->name('edit_password')->middleware('authenticateUser');
// contact
Route::get('/userhome/contact', 'User\ContactController@index')->name('contact')->middleware('authenticateUser');;
// about
Route::get('/userhome/about', 'User\AboutController@index')->name('about')->middleware('authenticateUser');;

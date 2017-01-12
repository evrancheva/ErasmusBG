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



Route::get('login',['uses'=>'Auth\LoginController@showLoginForm','as'=>'login']);
Route::post('login','Auth\LoginController@login');
Route::get('logout',['uses'=>'Auth\LoginController@logout','as'=>'logout']);

Route::get('register','Auth\RegisterController@showRegistrationForm');
Route::post('register','Auth\RegisterController@register');

//Password Reset
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset','Auth\ResetPasswordController@reset');

Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);

#Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle','middleware'=>'roles','roles'=>'User']);
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle']);
Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);

Route::get('/','PagesController@getIndex');
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/about','PagesController@getAbout');
Route::resource('posts','PostController');
//Route::resource('аccount','UserController',['except'=>['create','store']]);
Route::resource('account','AccountController');

Route::post('posts/{id}/deleteImage/{image_id}', 'PostController@destroyImage');
Route::post('posts/{id}/deletePdf/{pdf_id}', 'PostController@destroyPdf');
#Route::post('posts/deleteImage/{id}',['as'=>'posts.destroyImage','uses'=>'PostController@destroyImage']);
Route::post('/account/change_password',['uses'=>'AccountController@changePassword','as'=>'changePassword']);
Route::post('/account/add_logo',['uses'=>'AccountController@addLogo','as'=>'addLogo']);

//User part
Route::get('dashboard',['as'=>'user.dashboard','uses'=>'UserController@getDashboard']);
//Admin
Route::get('/admin',['as'=>'admin.dashboard','uses'=>'AdminController@getWelcome','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/posts',['as'=>'admin.posts','uses'=>'AdminController@getPosts','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/users',['as'=>'admin.users','uses'=>'AdminController@getUsers','middleware'=>'roles','roles'=>'Admin']);
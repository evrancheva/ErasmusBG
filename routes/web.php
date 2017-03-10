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

Route::get('/earnings', 'AdminController@earnings')->middleware('admin');

Route::get('login',['uses'=>'Auth\LoginController@showLoginForm','as'=>'login']);
Route::post('login','Auth\LoginController@login');
Route::get('logout',['uses'=>'Auth\LoginController@logout','as'=>'logout']);

Route::get('register',['uses'=>'Auth\RegisterController@showRegistrationForm','as'=>'register']);
Route::post('register','Auth\RegisterController@register');

//Password Reset
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset','Auth\ResetPasswordController@reset');

Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);

#Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle','middleware'=>'roles','roles'=>'User']);
Route::get('trips/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle']);
Route::get('trips',['uses'=>'BlogController@getIndex','as'=>'blog.index']);

Route::post('vote/{id}',['as'=>'blog.rate','uses'=>'BlogController@rate']);


Route::get('/',['uses'=>'PagesController@getIndex','as'=>'index']);
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/terms','PagesController@getTerms');
Route::get('/about','PagesController@getAbout');
Route::resource('posts','PostController');

Route::get('/search',['uses'=>'PostController@searchPosts','as'=>'posts.search']);
Route::get('/posts/results',['uses'=>'PostController@getResults','as'=>'posts.results']);


//Route::resource('аccount','UserController',['except'=>['create','store']]);
Route::resource('account','AccountController');
Route::get('/organizations',['uses'=>'PagesController@getOrganizations','as'=>'organizations']);

Route::post('/deleteImage/{image_id}', 'PostController@destroyImage');
Route::post('posts/{id}/deletePdf/{pdf_id}', 'PostController@destroyPdf');
#Route::post('posts/deleteImage/{id}',['as'=>'posts.destroyImage','uses'=>'PostController@destroyImage']);
Route::post('/account/change_password',['uses'=>'AccountController@changePassword','as'=>'changePassword']);
Route::post('/account/add_logo',['uses'=>'AccountController@addLogo','as'=>'addLogo']);

//User part
Route::get('dashboard',['as'=>'user.dashboard','uses'=>'UserController@getDashboard']);


//ADMIN

Route::group(['middleware' => 'admin'], function () {
		Route::get('/admin',['as'=>'admin.dashboard','uses'=>'AdminController@getWelcome','middleware'=>'roles','roles'=>'Admin']);
	//Posts
	Route::get('/admin/posts',['as'=>'admin.posts','uses'=>'AdminController@getPosts','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/posts/{id}',['as'=>'admin.posts.show','uses'=>'AdminController@showPost','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/posts/{id}/edit',['as'=>'admin.posts.edit','uses'=>'AdminController@showEditFormPost','middleware'=>'roles','roles'=>'Admin']);
Route::put('/admin/posts/{id}/edit',['as'=>'admin.posts.update','uses'=>'AdminController@updatePost','middleware'=>'roles','roles'=>'Admin']);
Route::delete('/admin/posts/{id}',['as'=>'admin.posts.delete','uses'=>'AdminController@deletePost','middleware'=>'roles','roles'=>'Admin']);
Route::post('admin/posts/{id}/deletePostImage/{image_id}', 'AdminController@destroyPostImage');
Route::post('admin/posts/{id}/deletePostPdf/{pdf_id}', 'AdminController@destroyPostPdf');
Route::get('admin/search',['uses'=>'AdminController@searchPosts','as'=>'admin.posts.search']);

Route::post('/admin/user/{id}/roles}',['as'=>'admin.user.makeAdmin','uses'=>'AdminController@makeAdmin']);

Route::get('/admin/users',['as'=>'admin.users','uses'=>'AdminController@getUsers','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/users/{id}',['as'=>'admin.users.show','uses'=>'AdminController@showUser','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/user/{id}/edit',['as'=>'admin.user.edit','uses'=>'AdminController@showEditUserForm','middleware'=>'roles','roles'=>'Admin']);
Route::put('/admin/user/{id}/edit',['as'=>'admin.user.update','uses'=>'AdminController@updateUser','middleware'=>'roles','roles'=>'Admin']);
Route::delete('/admin/user/{id}',['as'=>'admin.user.delete','uses'=>'AdminController@deleteUser','middleware'=>'roles','roles'=>'Admin']);
Route::put('/admin/user/{id}/editUser',['as'=>'admin.user.updateUser','uses'=>'AdminController@updateInfoUser','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/user/{id}/roles',['as'=>'admin.user.roles','uses'=>'AdminController@showRoles','middleware'=>'roles','roles'=>'Admin']);

Route::get('/admin/banners_management',['as'=>'admin.banners_management','uses'=>'BannerController@getBanners','middleware'=>'roles','roles'=>'Admin']);
Route::get('/admin/banner_management/{id}/edit',['as'=>'admin.banners.edit','uses'=>'BannerController@showEditBanner','middleware'=>'roles','roles'=>'Admin']);
Route::put('/admin/banner_management/{id}/edit',['as'=>'admin.banners.update','uses'=>'BannerController@updateBanner','middleware'=>'roles','roles'=>'Admin']);
});
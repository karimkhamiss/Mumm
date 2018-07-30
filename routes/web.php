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
Route::get('/',function () {
    return view('pages.index');
});
Route::get('/login',['as'=>'login',function () {
    return view('pages.index');
}]);
Route::post('/signin', [ 'as' => 'signin', 'uses' => 'UserController@signin']);
Route::post('/signup','UserController@signup');
Route::group(['middleware' => 'auth'],function () {
    Route::get('/signout',array('as' => 'signout' ,'uses' => 'UserController@signout'));
    Route::get('/dashboard',array('as' => 'dashboard' , 'uses' => 'RouteController@Dashboard') );
    Route::get('/admin',array('as' => 'admin' , 'uses' => 'RouteController@admin' ))->middleware(['App\Http\Middleware\RoleChecker:admin']);
    Route::get('/articles',array('as' => 'articles' , 'uses' => 'RouteController@articles' ))->middleware(['App\Http\Middleware\RoleChecker:articles']);
    Route::get('/categories',array('as' => 'categories' , 'uses' => 'RouteController@categories' ))->middleware(['App\Http\Middleware\RoleChecker:categories']);
    Route::get('/admins',array('as' => 'admins' , 'uses' => 'RouteController@admins' ))->middleware(['App\Http\Middleware\RoleChecker:admins']);
    Route::get('/followers',array('as' => 'followers' , 'uses' => 'RouteController@followers' ))->middleware(['App\Http\Middleware\RoleChecker:followers']);
    Route::group(["prefix"=>"articles"],function(){

    });
});

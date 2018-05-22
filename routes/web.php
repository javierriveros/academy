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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home')->name('home');

Route::resource('courses', 'CoursesController')->only([
    'index', 'show'
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::resource('courses', 'CoursesController')->only([
        'create', 'edit', 'store', 'update', 'destroy'
    ]);
    Route::resource('courses.modules', 'ModulesController');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});
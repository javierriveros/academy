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

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'UsersController@profile')->name('users.profile');
    Route::put('profile/{user}', 'UsersController@update')->name('users.update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    // Route::resource('courses', 'CoursesController')->only([
    //     'create', 'edit', 'store', 'update', 'destroy'
    // ]);
    // Route::resource('courses.modules', 'ModulesController');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    # Users
    Route::get('users', 'UsersController@index')->name('admin.users.index');
    Route::get('users/{users}/edit', 'UsersController@edit')->name('admin.users.edit');

    # Courses
    Route::match(['get', 'head'], '/courses', 'CoursesController@indexAdmin')->name('admin.courses.index');
    Route::match(['get', 'head'], '/courses/create', 'CoursesController@create')->name('admin.courses.create');
    Route::post('/courses', 'CoursesController@store')->name('admin.courses.store');
    Route::match(['get', 'head'], '/courses/{course}/edit', 'CoursesController@edit')->name('admin.courses.edit');
    Route::match(['put', 'patch'], '/courses/{course}', 'CoursesController@update')->name('admin.courses.update');
    Route::delete('/courses/{course}', 'CoursesController@destroy')->name('admin.courses.delete');
    
});
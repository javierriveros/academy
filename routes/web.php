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

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'UsersController@profile')->name('users.profile');
    Route::put('profile/{user}', 'UsersController@update')->name('users.update');

    Route::resource('courses', 'CoursesController')->only([
        'index', 'show'
    ]);

    Route::resource('courses.topics', 'TopicsController')->only(['show']);

    # Questions
    Route::resource('course.questions', 'QuestionsController')->except([
        'index', 'show', 'create'
    ]);
    Route::resource('course.question.answers', 'AnswersController')->except([
        'index', 'show', 'create'
    ]);
    Route::post('courses/{course}/enroll', 'CoursesController@enroll')->name('courses.enroll');
    Route::post('courses/{course}/unenroll', 'CoursesController@unenroll')->name('courses.unenroll');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::resource('courses', 'CoursesController')->only([
    //     'create', 'edit', 'store', 'update', 'destroy'
    // ]);
    // Route::resource('courses.modules', 'ModulesController');
    Route::group(['middleware' => 'isAdmin'], function () {
        # Users
        Route::get('users', 'UsersController@index')->name('admin.users.index');
        Route::get('users/{users}/edit', 'UsersController@edit')->name('admin.users.edit');

        # Courses
        Route::match(['get', 'head'], '/courses/create', 'CoursesController@create')->name('admin.courses.create');
        Route::post('/courses', 'CoursesController@store')->name('admin.courses.store');
        Route::delete('/courses/{course}', 'CoursesController@destroy')->name('admin.courses.delete');

        # Questions
        Route::match(['get', 'head'], '/questions', 'QuestionsController@index')->name('admin.questions.index');
    });
    Route::group(['middleware' => 'isTeacher'], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

        # Courses
        Route::match(['get', 'head'], '/courses', 'CoursesController@indexAdmin')->name('admin.courses.index');
        Route::match(['get', 'head'], '/courses/{course}/edit', 'CoursesController@edit')->name('admin.courses.edit');
        Route::match(['put', 'patch'], '/courses/{course}', 'CoursesController@update')->name('admin.courses.update');

        # Modules
        Route::match(['get', 'head'], '/courses/{course}/modules/create', 'ModulesController@create')->name('admin.modules.create');
        Route::post('/courses/{course}/modules', 'ModulesController@store')->name('admin.modules.store');
        Route::match(['get', 'head'], '/courses/{course}/modules/{module}/edit', 'ModulesController@edit')->name('admin.modules.edit');
        Route::match(['put', 'patch'], '/courses/{course}/modules/{module}', 'ModulesController@update')->name('admin.modules.update');
        Route::delete('/courses/{course}/modules/{module}', 'ModulesController@destroy')->name('admin.modules.delete');

        # Topics
        Route::match(['get', 'head'], '/courses/{course}/topics/create', 'TopicsController@create')->name('admin.topics.create');
        Route::post('/courses/{course}/topics', 'TopicsController@store')->name('admin.topics.store');
        Route::match(['get', 'head'], '/courses/{course}/topics/{topic}/edit', 'TopicsController@edit')->name('admin.topics.edit');
        Route::match(['put', 'patch'], '/courses/{course}/topics/{topic}', 'TopicsController@update')->name('admin.topics.update');
        Route::delete('/courses/{course}/topics/{topic}', 'TopicsController@destroy')->name('admin.topics.delete');

        # Partial Notes
        Route::resource('course.partial_notes', 'PartialNotesController')->except('show');
        Route::resource('course.notes', 'NotesController')->except('show');
    });
});
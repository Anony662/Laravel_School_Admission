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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');
    
    // Add student routes
    Route::resource('students', 'Backend\StudentsController', ['names' => 'admin.students']);

    // Add student routes
    Route::resource('notices', 'Backend\NoticeController', ['names' => 'admin.notices']);

    // Add Departments Route
    Route::resource('departements', 'Backend\DepartmentsController',['names' => 'admin.departments']);

    // Add Courses Routes
    Route::resource('courses', 'Backend\CoursesController', ['names' => 'admin.courses']);

    Route::resource('employees','Backend\EmployeesController', ['names' => 'admin.employees']); 
    // Admission routes
     //Route::resource('admissions', 'Backend\AdmissionsController', ['names' => 'admin.admissions']);
    
     // Add Departments Route
    Route::resource('message', 'Backend\MessageController',['names' => 'admin.message']);

    // Registration Routes
    Route::get('/register', 'Backend\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Backend\Auth\RegisterController@register')->name('admin.register.submit');
 
    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});


/**
 * User routes with CheckFormAccessDate middleware
 */
    Route::group(['middleware' => ['auth', 'CheckFormAccessDate']], function () {
    Route::get('/student/profile', 'StudentController@showProfile')->name('student.profile');
    Route::resource('students', 'Backend\StudentsController')->except(['index', 'destroy', 'show']);
});

/*Route::get('/students', 'Backend\StudentsController@index')->name('admin.students.index');
Route::get('/students/{student}', 'Backend\StudentsController@show')->name('admin.students.show');
Route::delete('/students/{student}', 'Backend\StudentsController@destroy')->name('admin.students.destroy');*/
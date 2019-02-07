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
});


Auth::routes();


Route::prefix('student')->group(function(){
    /* STUDENT AUTH*/
    /* REGISTER */
    Route::get('/register', 'Auth\StudentRegisterController@showStudentRegistrationForm')->name('StudentRegister');
    Route::post('/register','Auth\studentRegisterController@register')->name('studentRegister');

    /* DASHBOARD */
    Route::get('/', 'StudentController@index')->name('student');
});
Route::prefix('company')->group(function(){
    /* COMPANY AUTH*/
    /* REGISTER */
    Route::get('/register', 'Auth\CompanyRegisterController@showCompanyRegistrationForm')->name('CompanyRegister');
    Route::post('/register','Auth\CompanyRegisterController@register')->name('CompanyRegister');

    /* DASHBOARD */
    Route::get('/', 'CompanyController@index')->name('Company');
});
Route::prefix('AM')->group(function(){
    /* AM */
    /* DASHBOARD */
    Route::get('/', 'AMController@index')->name('AM');
});
/*
Route::get('/login', 'UsersLoginController@showLoginForm')->name('Userlogin');
Route::post('/login','UsersLoginController@login')->name('Userlogin');
*/
Route::get('/home', 'HomeController@index')->name('home');


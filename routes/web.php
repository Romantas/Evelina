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

/* STUDENT AUTH*/
Route::get('student/register', 'Auth\StudentRegisterController@showStudentRegistrationForm')->name('StudentRegister');
Route::post('student/register','Auth\studentRegisterController@register')->name('studentRegister');
/* COMPANY AUTH*/
Route::get('company/register', 'Auth\CompanyRegisterController@showCompanyRegistrationForm')->name('CompanyRegister');
Route::post('company/register','Auth\CompanyRegisterController@register')->name('CompanyRegister');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/student', 'StudentController@index')->name('student');
Route::get('/AM', 'AMController@index')->name('AM');
Route::get('/company', 'CompanyController@index')->name('Company');

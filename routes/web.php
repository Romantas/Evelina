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

Route::get('/', 'IndexController@index')->name('main');

Route::get('/search', 'IndexController@search');


Auth::routes();


Route::prefix('student')->group(function(){
    /* STUDENT AUTH*/
    /* REGISTER */
    Route::get('/register', 'Auth\StudentRegisterController@showStudentRegistrationForm')->name('StudentRegister');
    Route::post('/register','Auth\studentRegisterController@register')->name('studentRegister');

    /* DASHBOARD */
    Route::get('/', 'StudentController@index')->name('student');

    /* PROFILE */
    //Route::get('/profile', 'StudentProfileController@edit')->name('StudentProfile');

});
Route::prefix('company')->group(function(){
    /* COMPANY AUTH*/
    /* REGISTER */

    Route::get('/register', 'Auth\CompanyRegisterController@showCompanyRegistrationForm')->name('CompanyRegister');
    Route::post('/register','Auth\CompanyRegisterController@register')->name('CompanyRegister');

    /* DASHBOARD */
    Route::get('/', 'CompanyController@index')->name('company');

    /* PROFILE */

    Route::get('/profile/{id}', 'CompanyProfileController@edit')->name('CompanyProfile');
    Route::patch('/profile/{id}', 'CompanyProfileController@update')->name('CompanyProfile.update');

    /* PRACTICE */

    Route::resource('practice', 'PracticeController');
});
Route::prefix('AM')->group(function(){
    /* AM */
    /* DASHBOARD */
    Route::get('/', 'AMController@index')->name('AM');

    /* PROFILE */
    //Route::get('/profile', 'AMProfileController@edit')->name('AMProfile');
});

Route::get('/conversation', 'MessageController@index')->name('conversation');
Route::get('/contacts', 'MessageController@getContacts');
Route::get('/message/{email}', 'MessageController@getMessageFor');
Route::post('/message/send', 'MessageController@send');

Route::get('/login', 'Auth\UsersLoginController@showLoginForm')->name('Userlogin');
Route::post('/login','Auth\UsersLoginController@login')->name('Userlogin');

Route::post('logout', 'Auth\UsersLoginController@logout')->name('Userlogout');

Route::get('/home', 'HomeController@index')->name('home');


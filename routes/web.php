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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/homepage', 'IndexController@index');
Route::get('/past-papers', 'PastPaperController@papers');
Route::get('/about-us', 'AboutUsController@about');

Route::match(['get', 'post'], '/admin', 'AdminController@login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route for the paper listings
Route::get('/papers/{url}','PapersController@papers');

//Route for paper detail page
Route::get('/paper/{id}', 'PapersController@paperDetails');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');


//degree routes (admin panel)
Route::match(['get', 'post'], '/admin/add-degree', 'DegreeController@addDegree');
Route::match(['get', 'post'], '/admin/edit-degree/{id}', 'DegreeController@editDegree');
Route::match(['get', 'post'], '/admin/delete-degree/{id}', 'DegreeController@deleteDegree');
Route::get('/admin/view-degrees', 'DegreeController@viewDegrees');

//past paper routes (admin panel)
Route::match(['get', 'post'],'/admin/add-paper', 'PapersController@addPaper');
Route::post('upload', 'PapersController@addPaper');
Route::get('/admin/view-papers', 'PapersController@viewPapers');
Route::match(['get', 'post'], '/admin/edit-paper/{id}', 'PapersController@editPaper');
Route::get('/admin/delete-paper-thumb/{id}', 'PapersController@deletePaperThumb');
Route::get('/admin/delete-paper-file/{id}', 'PapersController@deletePaperFile');
Route::get('/admin/delete_paper/{id}', 'PapersController@deletePaper');
});


Route::get('/logout', 'AdminController@logout');



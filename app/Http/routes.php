<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('/', function () {
    return view('ss.home.index');
});

get('/groups', function () {
    return view('ss.groups.index');
});

get('/forums', function () {
    return view('ss.forums.index');
});

get('/noticeboard', function () {
    return view('ss.noticeboards.index');
});



//Route to search a new file in both mysql-db and elastic-search
Route::get('/search-file', 'SearchController@searchFile');
//Route to search a person using both sql and elasticsearch
Route::get('/search-people', 'SearchController@searchPeople');
//Route to create a new file in both mysql-db and elasticsearch
Route::get('/create-file', 'FilesController@store');
//Route to create a new person in both mysql-db and elasticsearch
Route::get('/create-people', 'PeopleController@store');
//Route to search all people form the mysql-db or elasticsearch
Route::get('/search-all-people', 'SearchController@searchAllPeople');
//Route to search all files from the mysql-db or elastic search
Route::get('/search-all-files', 'SearchController@searchAllFiles');



// Authentication routes...
get('auth/login', 'Auth\AuthController@getLogin');
post('auth/login', 'Auth\AuthController@postLogin');
get('auth/logout', 'Auth\AuthController@getLogout');


// Registration routes...
get('auth/register', 'Auth\AuthController@getRegister');
post('auth/register', 'Auth\AuthController@postRegister');

//Redirect routes after user registration

get('dashboard/lecturer', 'Dashboard\DashboardController@getLecturerDashboard');

get('dashboard/student', 'Dashboard\DashboardController@getStudentDashboard');
get('join-group/student', 'Dashboard\DashboardController@joinInitialGroup');

get('finish-join-group', 'Dashboard\DashboardController@finishJoinGroup');
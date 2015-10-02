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
    $title = 'Home';
    return view('ss.home.index', compact('title'));
});

get('/profile', function () {
    $title = 'My Profile';
    return view('ss.profile.index', compact('title'));
});

get('/backpack', function () {
    $title = 'BackPack';
    return view('ss.backpack.index', compact('title'));
});


get('/groups', function () {
    $title = 'Groups';
    return view('ss.groups.index', compact('title'));
});

get('/group', function () {
    $title = 'Groups';
    return view('ss.groups.activity', compact('title'));
});

get('/group/update', function () {
    $title = 'Group Update';
    return view('ss.groups.update', compact('title'));
});

get('/group/files', function () {
    $title = 'Group  File';
    return view('ss.groups.files', compact('title'));
});

get('/group/members', function () {
    $title = 'Group  Members';
    return view('ss.groups.members', compact('title'));
});

get('/group/member', function () {
    $title = 'John Goe';
    return view('ss.groups.member', compact('title'));
});

get('/discussions', function () {
    $title = "Discussions";
    return view('ss.discussions.index', compact('title'));
});

get('/discussion', function () {
    $title = "Discussion";
    return view('ss.discussions.discussion', compact('title'));
});

get('/share', function () {
    $title = "Share 'specific file'";
    return view('ss.groups.share', compact('title'));
});

get('/noticeboard', function () {
    $title = "NoticeBoard";
    return view('ss.noticeboards.index', compact('title'));
});



//Route to search a new file in both mysql-db and elastic-search
get('/search-file', 'SearchController@searchFile');
//Route to search a person using both sql and elasticsearch
get('/search-people', 'SearchController@searchPeople');
//Route to create a new file in both mysql-db and elasticsearch
get('/create-file', 'FilesController@store');
//Route to create a new person in both mysql-db and elasticsearch
get('/create-people', 'PeopleController@store');
//Route to search all people form the mysql-db or elasticsearch
get('/search-all-people', 'SearchController@searchAllPeople');
//Route to search all files from the mysql-db or elastic search
get('/search-all-files', 'SearchController@searchAllFiles');



// Authentication routes...
get('auth/login', 'Auth\AuthController@getLogin');
post('auth/login', 'Auth\AuthController@postLogin');
get('auth/logout', 'Auth\AuthController@getLogout');


// Registration routes...
get('auth/register', 'Auth\AuthController@getRegister');
post('auth/register', 'Auth\AuthController@postRegister');

//Redirect routes after user registration
get('finish-join-group', 'Dashboard\DashboardController@finishJoinGroup');

get('join-group/student', 'Dashboard\DashboardController@joinInitialGroup');
get('dashboard/student', 'Dashboard\DashboardController@getStudentDashboard');

get('dashboard/lecturer', 'Dashboard\DashboardController@getLecturerDashboard');

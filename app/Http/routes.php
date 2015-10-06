<?php

//\Auth::login(\App\User::find(1));
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

get('/institution', function () {
    $title = 'Home';
    return view('ss.institutions.create', compact('title'));
});
post('/institution/create', function (\Illuminate\Http\Request $request) {
    \App\Institution::create($request->all());
    return redirect()->back();
});

get('/home', function () {
    $title = 'Home';
    return view('ss.home.index', compact('title'));
});

get('/logout', function () {
    \Auth::logout();
    return redirect('/auth/login');
});

get('/profile', function () {
    $title = 'My Profile';
    return view('ss.profile.index', compact('title'));
});

get('/backpack', function () {
    $title = 'BackPack';
    return view('ss.backpack.index', compact('title'));
});

/*
|--------------------------------------------------------------------------
| Group Routes
|--------------------------------------------------------------------------
|
| Here is where route related to groups are.
| 1.CRUD
| 2.Search
| 3.API
| 4.Joining and Leaving
| 4.Group Members
|
*/

/* 1. Group CRUD */
get('/groups/','GroupController@index');

post('/group/create', 'GroupController@store');

get('/group/{group}', 'GroupController@show');

get('/group/{group}/update', 'GroupController@edit');

post('/group/{group}/update', 'GroupController@update');

get('/group/{group}/delete', 'GroupController@edit');

/* 2. Search */
get('/groups/search','GroupController@search');

/* 3. API */

/* 4. Joining and leaving */
get('/group/{group}/join','GroupController@join');

get('/group/{group}/leave','GroupController@leave');

/* 5. Group members */
get('/group/{group}/members','GroupController@members');


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
/* Group API routes */


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

get('/noticeboard', 'NoticeController@index');

post('/noticeboard/create', 'NoticeController@create');



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
get('login', 'Auth\AuthController@getLogin');
post('login', 'Auth\AuthController@postLogin');
get('logout', 'Auth\AuthController@getLogout');


// Registration routes...
get('register', 'Auth\AuthController@getRegister');
post('register', 'Auth\AuthController@postRegister');

//Redirect routes after user registration
get('finish-join-group', 'Dashboard\DashboardController@finishJoinGroup');

get('join-group/student', 'Dashboard\DashboardController@joinInitialGroup');
get('dashboard/student', 'Dashboard\DashboardController@getStudentDashboard');

get('dashboard/lecturer', 'Dashboard\DashboardController@getLecturerDashboard');

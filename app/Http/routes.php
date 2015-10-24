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

/*
|--------------------------------------------------------------------------
| User authenticated routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'auth'], function () {

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

    /* Test routes */

    /* 1. Group CRUD */
    get('/groups/', 'GroupController@index');

    post('/group/create', 'GroupController@store');

    get('/group/{group}', 'GroupController@show');

    get('/group/{group}/update', 'GroupController@edit');

    post('/group/{group}/update', 'GroupController@update');

    get('/group/{group}/delete', 'GroupController@destroy');

    /* 3. API */
    get('api/groups/search/{filter}/{query}', 'GroupController@search');

    /* 4. Joining and leaving */
    get('/group/{group}/join', 'MemberController@store');

    get('/group/{group}/leave', 'MemberController@destroy');


    /* 5. Group members */
    get('/group/{group}/members', 'MemberController@index');

    get('/group/{group}/member/{user}', 'MemberController@show');


    /*
    |--------------------------------------------------------------------------
    | File Routes
    |--------------------------------------------------------------------------
    |
    | Here is where route related to groups are.
    |
    | Actions to achieve are:
    |
    | 1.Upload
    | 2.Share
    | 3.Delete
    | 4.Download
    | 5.Group Files
    | 6.Backpack
    |
    */

    /* 1. Upload */
    post('upload/file', 'FileController@store');

    /* 3. Delete */
    get('/file/{file}/delete', 'FileController@destroy');

    /* 5. Group Files */
    get('/group/{group}/files', 'FileController@groupFiles');

    /* 6.BackPack */
    get('/backpack', 'FileController@backpack');


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

    /*
    |--------------------------------------------------------------------------
    | Notice Routes
    |--------------------------------------------------------------------------
    |
    | Here is where route related to the notices are.
    |
    | Actions to achieve are:
    |
    | 1.Pin
    | 2.View
    | 2.Delete
    | 3.Search and Filter
    |
    */


    /* 1. Pin a notice */
    post('noticeboard/create', 'NoticeboardController@store');

    /* 2. View Notices */
    get('/noticeboard', 'NoticeboardController@index');

    /* 3. Delete Notice */
    get('/noticeboard/{notice}/delete', 'NoticeboardController@destroy');


    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    |
    | Here is where route related to the notices are.
    |
    | Actions to achieve are:
    |
    | 1.Home
    | 2.User Profile
    | 3.Logout
    |
    */

    /* 1.Home */
    get('/', 'HomeController@index');

    /* 2.User Profile */
    get('/profile', function () {
        $title = 'My Profile';
        return view('ss.profile.index', compact('title'));
    });

    /* 2. Logout Routes */
    get('logout', 'Auth\AuthController@getLogout');

});


/*
|--------------------------------------------------------------------------
| Guest routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'guest'], function () {

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    |
    | Here is where route related to the notices are.
    |
    | Actions to achieve are:
    |
    | 1.Login
    | 2.Register
    |
    */
    /* 1. Login Routes */
    get('login', 'Auth\AuthController@getLogin');
    post('login', 'Auth\AuthController@postLogin');

    /* 2. Registration routes */
    get('register', 'Auth\AuthController@getRegister');
    post('register', 'Auth\AuthController@postRegister');


});


/*
   |--------------------------------------------------------------------------
   | Api Routes
   |--------------------------------------------------------------------------
   |
   | Here is where route related to Api.
   |
   | Actions to achieve are:
   |
   | 1.User Activities
   | 2.All Group
   | 3.User Group
   | 4.User Files
   | 5.User NoticeBoard
   | 6.Group Activities
   | 7.Group Files
   | 8.Group Members
   |
   */

Route::group(['prefix' => 'api/ss/'], function () {
    get('all/groups', 'GroupApiController@all');
    get('user/groups/{userId}', 'GroupApiController@userGroups');
    get('/all/board/notices', 'NoticeboardApiController@allNotices');
    get('/add/file/{fileId}', 'BackpackApiController@addToBackpack');
    get('/all/backpack/files', 'BackpackApiController@backpackFiles');
    get('/all/backpack/topics', 'BackpackApiController@backpackTopics');
    get('/group/files/{groupUsername}', 'GroupApiController@groupFiles');
    get('/group/topics/{groupUsername}', 'GroupApiController@groupTopics');
    get('/group/members/{groupUsername}', 'GroupApiController@groupMembers');
    get('user/activities/{userId}', 'ActivityApiController@userActivities');
    get('group/activities/{groupId}', 'ActivityApiController@groupActivities');
    get('/share/file/{fileId}/group/{groupUsername}', 'BackpackApiController@shareFileToGroup');

});
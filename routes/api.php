<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication & Password Reset
//----------------------------------

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'Auth\LoginAPIController@login');
    Route::post('register', 'Auth\LoginAPIController@register');
    Route::post('refresh_token', 'Auth\LoginAPIController@refresh');
});

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::post('auth/logout', 'Auth\LoginAPIController@logout');
    Route::get('auth/user', 'Auth\LoginAPIController@me');



    // Route::apiResource('users', 'Api\User\UserController');
    // Route::get('/bootstrap', [
    //     'as' => 'bootstrap',
    //     'uses' => 'Api\User\UserController@getBootstrap'
    // ]);
    Route::get('users/{user}/permissions', 'Api\User\UserPermissionsController');

    // Route::get('entities/{entity}/permissions', 'Api\Entity\EntityPermissionsController');

    Route::apiResource('employees', 'Api\EmployeeController');




    Route::group(['prefix' => 'admin',], function () {
        // Route::apiResource('permissions', 'Api\PermissionController');
        // Route::get('users', 'Api\UserController@index')->name('admin.users.index')->middleware('role_or_permission:Super Admin|');
    });
});

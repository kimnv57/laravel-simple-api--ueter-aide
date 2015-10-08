<?php
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    #Users
    Route::get('users/', 'Admin\UserController@index');
    Route::get('users/create', 'Admin\UserController@getCreate');
    Route::post('users/create', 'Admin\UserController@postCreate');
    Route::get('users/{id}/edit', 'Admin\UserController@getEdit');
    Route::post('users/{id}/edit', 'Admin\UserController@postEdit');
    Route::get('users/{id}/delete', 'Admin\UserController@getDelete');
    Route::post('users/{id}/delete', 'Admin\UserController@postDelete');
    Route::get('users/data', 'Admin\UserController@data');

    #Notifications
    Route::get('notifications/', 'Admin\NotificationController@index');
    Route::get('notifications/create', 'Admin\NotificationController@getCreate');
    Route::post('notifications/create', 'Admin\NotificationController@postCreate');
    Route::get('notifications/{id}/edit', 'Admin\NotificationController@getEdit');
    Route::post('notifications/{id}/edit', 'Admin\NotificationController@postEdit');
    Route::get('notifications/{id}/delete', 'Admin\NotificationController@getDelete');
    Route::post('notifications/{id}/delete', 'Admin\NotificationController@postDelete');
    Route::get('notifications/data', 'Admin\NotificationController@data');

    #Packages
    Route::get('packages/', 'Admin\PackageController@index');
    Route::get('packages/create', 'Admin\PackageController@getCreate');
    Route::post('packages/create', 'Admin\PackageController@postCreate');
    Route::get('packages/{id}/edit', 'Admin\PackageController@getEdit');
    Route::post('packages/{id}/edit', 'Admin\PackageController@postEdit');
    Route::get('packages/{id}/delete', 'Admin\PackageController@getDelete');
    Route::post('packages/{id}/delete', 'Admin\PackageController@postDelete');
    Route::get('packages/data', 'Admin\PackageController@data');

    Route::get('apitest', 'ApiTestController@index');
    
});
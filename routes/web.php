<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'PagesController@homepage');
Route::get('/home', 'UsersController@dashboard')->middleware('auth');

// Admin Routes
Route::get('/admin/manage/courses', 'AdminsController@manage_courses')->middleware('admin_auth');
Route::get('/admin/manage/users', "AdminsController@manage_users")->middleware('admin_auth');

// Course Routes
Route::get('/admin/manage/courses/get', 'CoursesController@index');
Route::get('/admin/manage/courses/{id}/pick', 'CoursesController@pick');
Route::post('/admin/manage/courses/store', 'CoursesController@store');
Route::post('/admin/manage/courses/{id}/delete', 'CoursesController@destroy');
Route::post('/admin/manage/courses/{id}/update', 'CoursesController@update');

// Topic Routes
Route::get('/admin/manage/courses/{course_id}/topics/get', 'TopicsController@index');
Route::get('/admin/manage/courses/topics/{topic_id}/pick', 'TopicsController@pick');
Route::post('/admin/manage/courses/{course_id}/topics', 'TopicsController@store');
Route::post('admin/manage/courses/topics/{topic_id}/delete', 'TopicsController@destroy');
Route::post('/admin/manage/courses/topics/{topic_id}/update', 'TopicsController@update');

// Lesson Routes
Route::get('/admin/manage/courses/topics/lessons/{lesson_id}/pick', 'LessonsController@pick');
Route::post('/admin/manage/courses/topics/lessons/store', "LessonsController@store");
Route::post('/admin/manage/courses/topics/lessons/{lesson_id}/delete', "LessonsController@destroy");
Route::post('/admin/manage/courses/topics/lessons/{lesson_id}/update', "LessonsController@update");

// User Routes
Route::get('/admin/manage/users/get/all', 'UsersController@index');
Route::get('/admin/manage/users/get/unsubscribed', 'UsersController@unsubscribed');
Route::get('/admin/manage/users/get/pending', 'UsersController@pending');
Route::get('/admin/manage/users/get/subscribed', 'UsersController@subscribed');
Route::get('/admin/manage/users/get/expired', 'UsersController@expired');
Route::post('/admin/manage/users/{user_id}/grant/{grant_type}', 'UsersController@grant');
Route::post('/admin/manage/users/{user_id}/moveToPending', 'UsersController@moveToPending');
Route::post('/admin/manage/users/{user_id}/unsubscribe', 'UsersController@unsubscribe');
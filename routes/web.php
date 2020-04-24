<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'PagesController@homepage');
Route::get('/home', 'UserDashboardsController@index')->middleware('auth');

// Admin Routes
Route::get('/admin/manage/courses', 'AdminsController@manage_courses')->middleware('admin_auth');
Route::get('/admin/manage/users', "AdminsController@manage_users")->middleware('admin_auth');

// Course Routes
Route::get('/admin/manage/courses/get', 'CoursesController@index');
Route::get('/admin/manage/courses/{id}/pick', 'CoursesController@pick');
Route::post('/admin/manage/courses/store', 'CoursesController@store');
Route::post('/admin/manage/courses/{id}/delete', 'CoursesController@destroy');
Route::post('/admin/manage/courses/{id}/update', 'CoursesController@update');
Route::post('/admin/manage/courses/{id}/togglePublishedState', 'CoursesController@togglePublishedState');

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
Route::get('/admin/manage/users/get/renewal', 'UsersController@renewal');
Route::get('/admin/manage/users/get/certificates', 'UsersController@getCertificates');
Route::get('/admin/manage/users/toggleGrant/certificates/{certificate_id}', 'UsersController@toggleGrantCertificate');

Route::post('/admin/manage/users/{user_id}/grant/{grant_type}', 'UsersController@grant');
Route::post('/admin/manage/users/{user_id}/moveToPending', 'UsersController@moveToPending');
Route::post('/admin/manage/users/{user_id}/unsubscribe', 'UsersController@unsubscribe');

// User Dashboard Routes
  // Enrollment
  Route::get('/home/enroll', 'UsersController@enrollPage')->middleware('auth');
  Route::get('/home/enroll/monthly/basic_info', 'UsersController@monthlyEnrollPage')->middleware('auth');
  Route::get('/home/enroll/yearly/basic_info', 'UsersController@yearlyEnrollPage')->middleware('auth');
  Route::get('/home/enroll/lifetime/basic_info', 'UsersController@lifetimeEnrollPage')->middleware('auth');
  
  Route::post('/home/enroll/yearly/apply', 'UsersController@yearlyApply')->middleware('auth');
  Route::post('/home/enroll/monthly/apply', 'UsersController@monthlyApply')->middleware('auth');
  Route::post('/home/enroll/lifetime/apply', 'UsersController@lifetimeApply')->middleware('auth');

  Route::get('/home/enroll/success', "UsersController@success")->middleware('auth');

// Dashboard Routes
Route::get('/home/courses', 'UserDashboardsController@index')->middleware('auth');

// Courses Routes
Route::get('/courses/', 'UserCoursesController@index');
Route::get('/courses/watch/{course_id}/{topic_index}/{lesson_index}', 'UserCoursesController@validateProgress');
Route::get('/courses/{course_id}/completed', 'UserCoursesController@completed');

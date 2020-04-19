<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'PagesController@homepage');
Route::get('/home', 'UsersController@dashboard');

// Admin Routes
Route::get('/admin/manage/courses', 'AdminsController@manage_courses');

// Course Routes
Route::get('/admin/manage/courses/get', 'CoursesController@index');
Route::get('/admin/manage/courses/{id}/pick', 'CoursesController@pick');
Route::post('/admin/manage/courses/store', 'CoursesController@store');
Route::post('/admin/manage/courses/{id}/delete', 'CoursesController@destroy');
Route::post('/admin/manage/courses/{id}/update', 'CoursesController@update');
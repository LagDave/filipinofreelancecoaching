<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'PagesController@homepage');
Route::get('/home', 'UsersController@dashboard');

// Admin Routes
Route::get('/admin/manage/courses', 'AdminsController@manage_courses');
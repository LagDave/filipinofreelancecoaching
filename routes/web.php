<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


// Route::get('/', 'PagesController@homepage');
Route::get('/', 'PagesController@homepage');
// THE CLOSURE ABOVE GETS RID OF THE HOMEPAGE

Route::get('/home', 'UserDashboardsController@index')->middleware('auth');

// Admin Routes
Route::get('/admin/manage/courses', 'AdminsController@manage_courses')->middleware('admin_auth');
Route::get('/admin/manage/users', "AdminsController@manage_users")->middleware('admin_auth');
Route::get('/admin/statistics', 'AdminsController@statistics')->middleware('admin_auth');\

// Testimonial CPanel Routes
Route::get('/admin/manage/testimonials', 'TestimonialsController@index');
Route::post('admin/manage/testimonials/store', 'TestimonialsController@store');
Route::get('/admin/manage/testimonials/delete/{id}', 'TestimonialsController@delete');

// Announcement Routes
Route::get('/admin/manage/announcements', 'AnnouncementsController@manage')->middleware('admin_auth');
Route::post('/admin/manage/announcements/store', 'AnnouncementsController@store')->middleware('admin_auth');
Route::post('/admin/manage/announcements/delete/{announcement_id}','AnnouncementsController@delete')->middleware('admin_auth');

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

Route::post('/admin/manage/users/toggleCheck/expired/{user_id}', 'UsersController@toggleExpiredCheck');

// User Dashboard Routes
  // Enrollment
  Route::get('/home/enroll', 'UsersController@enrollPage')->middleware('auth');
  Route::get('/home/enroll/promo_a/basic_info', 'UsersController@monthlyEnrollPage')->middleware('auth');
  Route::get('/home/enroll/promo_b/basic_info', 'UsersController@yearlyEnrollPage')->middleware('auth');
  Route::get('/home/enroll/promo_c/basic_info', 'UsersController@lifetimeEnrollPage')->middleware('auth');
  Route::post('/home/enroll/yearly/apply', 'UsersController@yearlyApply')->middleware('auth');
  Route::post('/home/enroll/monthly/apply', 'UsersController@monthlyApply')->middleware('auth');
  Route::post('/home/enroll/lifetime/apply', 'UsersController@lifetimeApply')->middleware('auth');
  Route::get('/home/enroll/success', "UsersController@success")->middleware('auth');

  // User Password Change
  Route::post('/user/change_password', 'UsersController@changePass')->middleware('auth');

// Dashboard Routes
Route::get('/home/courses', 'UserDashboardsController@index')->middleware('auth');
Route::get('/home/profile', 'UserDashboardsController@profile')->middleware('auth');
// Route::get('/home/subscription', 'UserDashboardsController@subscription')->middleware('auth');
// Route::get('/home/contacts', "UserDashboardsController@contacts")->middleware('auth');
// Route::get('/home/cheat_sheet', "UserDashboardsController@cheatsheet")->middleware('has_plan');
// Route::get('/home/policies', "UserDashboardsController@policies")->middleware('has_plan');
Route::get('/home/announcements', "UserDashboardsController@announcements")->middleware('has_plan');

// Courses Routes
Route::get('/courses/', 'UserCoursesController@index');
Route::get('/courses/watch/{course_id}/{topic_index}/{lesson_index}', 'UserCoursesController@validateProgress');
Route::get('/courses/{course_id}/completed', 'UserCoursesController@completed');
Route::get('/courses/search', 'UserCoursesController@search');

// Downloadables Routes
Route::get('/admin/manage/downloadables', 'DownloadablesController@index');
Route::post('/admin/manage/downloadables/store', 'DownloadablesController@store');
Route::get('/admin/manage/downloadables/get', 'DownloadablesController@get');
Route::post('/admin/manage/downloadables/{downloadable_id}/destroy', 'DownloadablesController@destroy');


// Guest Routes
Route::get('/guest/courses', 'PagesController@courses');
Route::get('/guest/downloadables', 'PagesController@downloadables');

Route::get('/reset_password', 'PasswordResetsController@index');
Route::post('/reset_password/verify', 'PasswordResetsController@verify');
Route::post('/reset_password/update_pass', 'PasswordResetsController@update_pass');
Route::get('/reset_password/update_pass_form', 'PasswordResetsController@update_pass_form');
Route::post('/reset_password/updateStore', 'PasswordResetsController@updateStore');


// PREDEFINED PORTFOLIO TEMPLATE
Route::get('/portfolio/user/{username}', 'PortfoliosController@index');

Route::get('/home/portfolio/setup', 'PortfoliosController@setup')->middleware('has_plan');
Route::post('/home/portfolio/setup', 'PortfoliosController@saveSettings')->middleware('has_plan');
Route::post('/home/portfolio/setup/resume', 'PortfoliosController@uploadResume')->middleware('has_plan');
Route::post('/home/portfolio/setup/profilePic', 'PortfoliosController@uploadProfilePic')->middleware('has_plan');


Route::get('/home/portfolio/projects', 'PortfoliosController@projects')->middleware('has_plan');
Route::post('/home/portfolio/projects/store', 'PortfoliosController@storeProject')->middleware('has_plan');
Route::post('/home/portfolio/projects/delete/{id}', 'PortfoliosController@deleteProject')->middleware('has_plan');

Route::get('/home/portfolio/certificates', 'PortfoliosController@certificates')->middleware('has_plan');
Route::post('/home/portfolio/certificates/store', 'PortfoliosController@store')->middleware('has_plan');
Route::post('/home/portfolio/certificates/delete/{id}', 'PortfoliosController@deleteCertificate')->middleware('has_plan');
Route::get('/home/portfolio/certificates/setToFeatured/{id}', 'PortfoliosController@setToFeatured')->middleware('has_plan');
Route::get('/home/portfolio/certificates/setToNonFeatured/{id}', 'PortfoliosController@setToNonFeatured')->middleware('has_plan');
Route::get('/home/portfolio/certificates/edit/{id}', 'PortfoliosController@editCertificate')->middleware('has_plan');
Route::post('/home/portfolio/certificates/update/{id}', 'PortfoliosController@updateCertificate')->middleware('has_plan');
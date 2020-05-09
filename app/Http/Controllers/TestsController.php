<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    public function testForCompleted(Request $request, $course_id){
        $course = Course::find($course_id);
        $course_users = CourseUser::where(['course_id'=> $course_id, 'user_id'=> Auth::id()])->get();
        $course_user = CourseUser::where(['course_id'=> $course_id, 'user_id'=> Auth::id()])->get()[0];

        return response(['COURSE_USERS'=> $course_users, 'COURSE_USER' => $course_user]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardsController extends Controller
{
    public function index(){

        // Get the courses
        $courses = CourseUser::where('user_id', Auth::id())->get(); 
        $ids = array();
        foreach($courses as $course){
            array_push($ids, $course->course_id);
        }
        $courses =  Course::whereIn('id', $ids)->with(
            [
                'topics'=>function($q){
                    return $q->orderBy('id')->get();
                },
                'course_users'=> function($r){
                    return $r->where('user_id', Auth::id())->get();
                }
            ]
        )->paginate(16);


        return view('user_dash.courses', compact('courses'));
    }

    public function profile(){
        $user = Auth::user();
        return view('user_dash.profile', compact('user'));
    }
    public function subscription(){
        $user = Auth::user();
        return view('user_dash.subscription', compact('user'));
    }
    public function contacts(){
        return view('user_dash.contacts');
    }
}

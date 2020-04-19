<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{   
    public function index(){
        return Course::orderBy('id', 'desc')->get();
    }
    public function pick(Request $request, $id){
        return Course::find($id);
    }

    public function store(Request $request){
        $course = new Course;

        $course->title = $request->title;
        $course->description = $request->description;
        $course->cover_img =  $request->cover_img;
        $course->publisher = Auth::user()->username;

        return $course->save();
    }
    public function destroy(Request $request, $id){
        return Course::destroy($id);
    }
    public function update(Request $request, $id){
        return Course::where('id', $id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'cover_img'=>$request->cover_img
        ]);
    }
}
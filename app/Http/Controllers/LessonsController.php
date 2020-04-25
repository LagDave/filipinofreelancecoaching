<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    public function __construct(){
        $this->middleware('admin_auth');
    }
    public function store(Request $request){
        return Lesson::create([
            'name' => $request->name,
            'publisher'=> Auth::user()->username,
            'topic_id' => $request->topic_id,
            'vimeo_link'=>$request->vimeo_link,
            
            "duration"=> $request->duration
        ]);
    }
    public function destroy($lesson_id){
        return Lesson::destroy($lesson_id);
    }
    public function pick($lesson_id){
        return Lesson::find($lesson_id);
    }
    public function update(Request $request, $lesson_id){
        return Lesson::where('id', $lesson_id)->update([
            "name"=>$request->name,
            "vimeo_link"=>$request->vimeo_link,
            "topic_id"=> $request->topic_id,
            "publisher"=>Auth::user()->username,
            "duration"=> $request->duration
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function __construct(){
        $this->middleware('admin_auth');
    }
    public function index($course_id){
        return Topic::where('course_id', $course_id)->with(
            ['lessons'=> function($q){
                return $q->orderBy('created_at', 'asc')->get();
            }]
        )->orderBy('created_at', 'asc')->get();
    }
    public function store(Request $request, $course_id){
        return Topic::create([
            'course_id'=> $course_id,
            'name'=>$request->name,
            'publisher' => Auth::user()->username
        ]);
    }
    public function destroy($topic_id){
        return Topic::destroy($topic_id);
    }
    public function pick($topic_id){
        return Topic::find($topic_id);
    }
    public function update(Request $request, $topic_id){
        return Topic::where('id', $topic_id)->update([
            "name"=>$request->name,
            "publisher"=>Auth::user()->username
        ]);
    }

}

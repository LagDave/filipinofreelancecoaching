<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function manage(){
        $announcements = Announcement::orderBy('id', 'desc')->get();
        return view('admin.manage_announcements', compact('announcements'));
    }
    public function store(Request $request){
        if(Announcement::create(['content'=>$request->content, 'type'=> $request->type])){
            return back()->with('success', 'Announcement posted!');
        }

    }
    public function delete($announcement_id){
        if(Announcement::destroy($announcement_id)){
            return back()->with('success', 'Announcement Deleted!');
        }
    }
}

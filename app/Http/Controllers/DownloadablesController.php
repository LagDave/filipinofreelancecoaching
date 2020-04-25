<?php

namespace App\Http\Controllers;

use App\Downloadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadablesController extends Controller
{
    public function __construct(){
        $this->middleware('admin_auth');
    }
    public function index(){
        return view('admin.manage_downloadables');
    }
    public function get(){
        return Downloadable::orderBy('id', 'asc')->get();
    }
    public function store(Request $request){
        return Downloadable::create([
            'name'=>$request->name,
            'cover_img'=> $request->cover_img,
            'type'=>$request->type,
            'description'=>$request->description,
            'publisher'=>Auth::user()->username
        ]);
    }
    public function destroy($downloadable_id){
        return Downloadable::destroy($downloadable_id);
    }
}

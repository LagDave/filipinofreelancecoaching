<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function manage_courses(){
        return view('admin.manage_courses');
    }
}

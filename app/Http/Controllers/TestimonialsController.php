<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.manage_testimonials', compact('testimonials'));
    }
    public function store(Request $request){
        if(Testimonial::create($request->all())){
            return back()->with('success', 'Testimonial Created Successfully');
        }
    }
    public function delete($id){
        if(Testimonial::destroy($id)){
            return back()->with('success', 'Testimonial Deleted Successfully');
        }
    }
}

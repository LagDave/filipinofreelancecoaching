<?php

namespace App\Http\Controllers;

use App\Course;
use App\Testimonial;
use App\Downloadable;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        $testimonials = Testimonial::all();
        return view('homepage', compact('testimonials'));
    }
    public function courses(){
        $courses = Course::where('published', 'true')->orderBy('id', 'asc')->paginate(16);
        return view('guest.courses', compact('courses'));
    }
    public function downloadables(){
        $ebooks = Downloadable::where('type', 'ebook')->orderBy('id', 'desc')->paginate(25);
        $templates = Downloadable::where('type', 'template')->orderBy('id', 'desc')->paginate(25);
        $softwares_and_tools = Downloadable::where('type', 'software_or_tool')->orderBy('id', 'desc')->paginate(25);
        return view('guest.downloadables', compact('ebooks', 'templates', 'softwares_and_tools'));
    }
}

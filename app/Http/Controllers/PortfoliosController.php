<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    public function setup(){
        $portfolio_entry =  Portfolio::firstWhere('user_id', Auth::id());
        if(!$portfolio_entry){
            Portfolio::create(
                [
                    'user_id'=>Auth::id(),
                    'username'=> Auth::user()->username,
                    'email' => Auth::user()->email,
                    'full_name'=> Auth::user()->first_name . ' '. Auth::user()->last_name
                    ]
            );
        }

        $portfolio_entry =  Auth::user()->portfolio;
        return view('predefined_portfolio.setup', compact('portfolio_entry'));
    }
    public function saveSettings(Request $request){
        $portfolio = Portfolio::firstWhere('user_id', Auth::id());

        $portfolio->theme = $request->theme;
        $portfolio->role = $request->role;
        $portfolio->facebook_link = $request->facebook_link;
        $portfolio->twitter_link = $request->twitter_link;
        $portfolio->instagram_link = $request->instagram_link;
        $portfolio->linkedin_link = $request->linkedin_link;
        $portfolio->about_content = $request->about_content;
        $portfolio->address = $request->address;
        $portfolio->phone_number = $request->phone_number;

        $portfolio->save();

        return redirect()->back()->with('success', "Settings saved.");

    }
    public function index($username){
        $portfolio_entry = Portfolio::firstWhere('username', $username);

        $user = User::firstWhere('username', $username);

        $projects = $user->projects;
        if($portfolio_entry){
            return view('predefined_portfolio.index', compact('portfolio_entry', 'projects'));
        }
        abort(404);
    }
    public function uploadResume(Request $request){
        $file_name = Auth::user()->username.'.'.$request->file('resume')->extension();
        if($request->file('resume')->storeAs('public/resumes', $file_name)){
            $portfolio_entry = Portfolio::firstWhere('user_id', Auth::id());
            $portfolio_entry->resume_link = '/storage/resumes/'.$file_name;
            if($portfolio_entry->save()){
                return back()->with('success', 'Resume Uploaded and Saved!');
            }
        }
    }
    public function uploadProfilePic(Request $request){
        $file_name = Auth::user()->username.'.'.$request->file('profile_pic')->extension();
        if($request->file('profile_pic')->storeAs('public/profile_pics/', $file_name)){
            $portfolio_entry = Portfolio::firstWhere('user_id', Auth::id());
            $portfolio_entry->profile_pic = '/storage/profile_pics/'.$file_name;
            if($portfolio_entry->save()){
                return back()->with('success', 'Profile Picture Uploaded and Saved!');
            }
        }
    }
    public function projects(){
        $projects = Auth::user()->projects;
        return view('predefined_portfolio.projects', compact('projects'));
    }
    public function storeProject(Request $request){
        $project = new Project;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->thumbnail = $request->thumbnail;
        $project->link = $request->link;
        $project->user_id = Auth::id();

        if($project->save()){
            return back()->with('success', 'Project Added Successfully!');
        }
    }
    public function deleteProject($id){
        if(Project::find($id)->delete()){
            return back()->with('success', 'Project Deleted Successfully');
        }
    }
}

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
        $portfolio->online_jobs_link = $request->online_jobs_link;
        $portfolio->upwork_link = $request->upwork_link;
        $portfolio->freelancer_link = $request->freelancer_link;
        $portfolio->fiver_link = $request->fiver_link;
        $portfolio->intro_video = $request->intro_video;

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
        $featured_certificates = $user->certificates()->where('is_featured', 'true')->get();
        $non_featured_certificates = $user->certificates()->where('is_featured', 'false')->get();
        if($portfolio_entry){
            return view('predefined_portfolio.index', compact('portfolio_entry', 'projects', 'featured_certificates', 'non_featured_certificates'));
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

    public function certificates(){
        $featured_certificates = Auth::user()->certificates()->where('is_featured', 'true')->get();
        $non_featured_certificates = Auth::user()->certificates()->where('is_featured', 'false')->get();
        return view('predefined_portfolio.certificates', compact('featured_certificates', 'non_featured_certificates'));        
    }
    public function store(Request $request){
        if($request->is_featured == 'true'){

            if(isset($request->description) && $request->description !== ''){
                $featured_certificates = Auth::user()->certificates()->where('is_featured', 'true')->get();
                $featured_certificates_count = sizeof($featured_certificates);
                
                if($featured_certificates_count < 3){

                    if(Auth::user()->certificates()->create([
                        'title'=>$request->title,
                        'is_featured' => $request->is_featured,
                        'image'=> $request->image,
                        'description' => $request->description
                    ])){
                        return back()->with('success', 'Featured Certificate Added!');
                    }

                }else{
                    return back()->with('error', 'You can only feature up to 3 certificates.');
                }
            }
            return back()->with('error', 'Description is required for featured certificats.');

            

        }

        $non_featured_certificates = Auth::user()->certificates()->where('is_featured', 'false')->get();
        $non_featured_certificates_count = sizeof($non_featured_certificates);

        if($non_featured_certificates_count < 12){
            if(Auth::user()->certificates()->create([
                'title'=>$request->title,
                'is_featured' => $request->is_featured,
                'image'=> $request->image
            ])){
                return back()->with('success', 'Non-featured Certificate Added!');
            }
        }else{
            return back()->with('error', 'You can only add up to 12 non-featured certificates.');
        }

    }
    public function deleteCertificate($id){
        if(Auth::user()->certificates()->firstwhere('id', $id)->delete()){
            return back()->with('success', 'Certificate Deleted!');
        }
        return back()->with('error', 'Certificate not found');
    }
    public function setToFeatured($id){
        $featured_certificates = Auth::user()->certificates()->where('is_featured', 'true')->get();
        $featured_certificates_count = sizeof($featured_certificates);

        if($featured_certificates_count < 3){

            $certificate = Auth::user()->certificates()->firstWhere('id', $id);
            if($certificate->is_featured == 'false'){
                $certificate->is_featured = 'true';
                $certificate->save();
                return back()->with('success', 'certificate toggled');
            }

            $certificate->is_featured = 'false';
            $certificate->save();
            return back()->with('success', 'certificate toggled');
        }
        return back()->with('error', 'Remember, you can only have 3 featured certificates.');
    }
    public function setToNonFeatured($id){
        $non_featured_certificates = Auth::user()->certificates()->where('is_featured', 'false')->get();
        $non_featured_certificates_count = sizeof($non_featured_certificates);

        if($non_featured_certificates_count < 12){

            $certificate = Auth::user()->certificates()->firstWhere('id', $id);
            if($certificate->is_featured == 'false'){
                $certificate->is_featured = 'true';
                $certificate->save();
                return back()->with('success', 'certificate toggled');
            }

            $certificate->is_featured = 'false';
            $certificate->save();
            return back()->with('success', 'certificate toggled');
        }
        return back()->with('error', 'Remember, you can only have 12 featured certificates.');
    }
    public function editCertificate($id){
        $certificate = Auth::user()->certificates()->firstWhere('id', $id);
        if(isset($certificate)){
            return view('predefined_portfolio.edit_certificate', compact('certificate'));
        }
        return back()->with('error', 'Certificate not found');
    }
    public function updateCertificate($id, Request $request){
        $certificate = Auth::user()->certificates()->firstWhere('id', $id);
        if(isset($certificate)){
            $certificate->title = $request->title;
            $certificate->image = $request->image;
            $certificate->description = $request->description;

            if($certificate->save()){
                return redirect('/home/portfolio/certificates')->with('success', 'Certificate updated!');
            }
        }
        return back()->with('error', 'Certificate not found');
    }
}

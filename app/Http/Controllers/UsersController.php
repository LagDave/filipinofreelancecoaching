<?php

namespace App\Http\Controllers;

use App\User;
use App\Proof;
use Carbon\Carbon;
use App\CourseUser;
use Illuminate\Http\Request;
use App\Mail\PlanGrantedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('admin_auth')->except([
            'success',
            'enrollPage',
            'success',
            'enrollPage',
            'monthlyEnrollPage',
            'yearlyEnrollPage',
            'lifetimeEnrollPage',
            'monthlyApply',
            'yearlyApply',
            'lifetimeApply',
            'changePass',
            'confirmTermination',
        ]);
    }
    
    // Change Pass
    
    public function changePass(Request $request){
        $data = $request->validate([
            'password'=> 'required',
            'confirm_password'=> 'same:password'
        ]);
        $user = Auth::user();
        $user->password = Hash::make($data['password']);
        $user->save();
        return back()->with('success', "Password changed successfully!");
    }

    // Enrollment
        public function success(){
            return view('users.enroll_success');
        }
        public function enrollPage(){
            if(Auth::user()->plan == 'pending'){
                return redirect('/home')->with('error', 'Your application is still under pending. Please wait.');
            }
            return view ('users.enroll_page');
        }
        public function monthlyEnrollPage(){
            return view ('users.monthly_basic_info');   
        }
        public function yearlyEnrollPage(){
            return view ('users.yearly_basic_info');   
        }
        public function lifetimeEnrollPage(){
            return view ('users.lifetime_basic_info');   
        }

        public function getCertificates(){
            return CourseUser::where('completed', 'true')->with(
                [
                    'user'=>function($q){
                        $q->get();
                    },
                    'course'=>function ($r){
                        $r->get();
                    }
                ]
            )->orderBy('user_id')->get();
        }
        
        public function toggleGrantCertificate($certificate_id){
            $certificate = CourseUser::find($certificate_id);
            if($certificate->checked == 'false'){
                $certificate->checked = 'true';
                return $certificate->save();
            }
            $certificate->checked = 'false';
            return $certificate->save();
        }

        public function monthlyApply(Request $request){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
           ]);
           if ($files = $request->file('image')) {
               $destinationPath = 'payment_proofs/'; // upload path
               $proofImage = Auth::user()->username . '_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $proofImage);
               $insert['image'] = "$proofImage";
            }
            
            
            $user = User::find(Auth::id());
            if($user->plan == 'no_plan'){
                // Set user to pending registration
                $user->plan = 'pending';
                $user->plan_name = 'monthly';
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'monthly';
                $user->save();
            }


            // Set Proof
            Proof::create([
                'url'=> asset('/payment_proofs/'.$proofImage),
                'user_id'=>Auth::id()
            ]);

            return redirect('/home/enroll/success');
     
        }
        public function yearlyApply(Request $request){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
           ]);
           if ($files = $request->file('image')) {
               $destinationPath = 'payment_proofs/'; // upload path
               $proofImage = Auth::user()->username . '_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $proofImage);
               $insert['image'] = "$proofImage";
            }
            
            $user = User::find(Auth::id());
            if($user->plan == 'no_plan'){
                // Set user to pending registration
                $user->plan = 'pending';
                $user->plan_name = 'yearly';
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'yearly';
                $user->save();
            }



            // Set Proof
            Proof::create([
                'url'=> asset('/payment_proofs/'.$proofImage),
                'user_id'=>Auth::id()
            ]);

            return redirect('/home/enroll/success');
        }
        public function lifetimeApply(Request $request){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
           ]);
           if ($files = $request->file('image')) {
               $destinationPath = 'payment_proofs/'; // upload path
               $proofImage = Auth::user()->username . '_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $proofImage);
               $insert['image'] = "$proofImage";
            }
            
            $user = User::find(Auth::id());
            if($user->plan == 'no_plan'){
                // Set user to pending registration
                $user->plan = 'pending';
                $user->plan_name = 'lifetime';
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'lifetime';
                $user->save();
            }



            // Set Proof
            Proof::create([
                'url'=> asset('/payment_proofs/'.$proofImage),
                'user_id'=>Auth::id()
            ]);

            return redirect('/home/enroll/success');
        }


    // API
    public function index(){
        return User::all();
    }
    public function unsubscribed(){
        return User::where('plan', 'no_plan')->orderBy('id', 'asc')->get();
    }
    public function pending(){
        return User::where('plan', 'pending')->orderBy('id', 'asc')->with([
            'proofs'=>function($q){
                $q->orderBy('id', 'desc');
            }
        ])->get();
    }
    public function subscribed(){
        return User::where('plan', 'has_plan')->orderBy('id', 'asc')->with([
            'proofs'=>function($q){
                $q->orderBy('id', 'desc');
            }
        ])->get();
    }
    public function expired(){
        return User::where('plan', 'expired')->orderBy('id', 'asc')->get();
    }
    public function renewal(){
        return User::where('plan', 'renewal')->orderBy('id', 'asc')->with([
            'proofs'=>function($q){
                $q->orderBy('id', 'desc');
            }
        ])->get();
    }
    public function grant($user_id, $grant_type){
        // set subscription start
        $user = User::find($user_id);
        if($grant_type == 'monthly'){
            $user->subscription_start =  Carbon::now()->format('m-d-Y');
            $user->subscription_end = Carbon::now()->addDays(30)->format('m-d-Y');
            $user->latest_plan_update = Carbon::now()->format('m-d-Y');
            $user->plan_name = 'monthly';
        }else if($grant_type == 'yearly'){
            $user->subscription_start =  Carbon::now()->format('m-d-Y');
            $user->subscription_end = Carbon::now()->addDays(366)->format('m-d-Y');
            $user->latest_plan_update = Carbon::now()->format('m-d-Y');
            $user->plan_name = 'yearly';
        }else if($grant_type == 'lifetime'){
            $user->subscription_start =  'lifetime';
            $user->subscription_end = 'lifetime';
            $user->latest_plan_update = Carbon::now()->format('m-d-Y');
            $user->plan_name = 'lifetime';
        }

        $user->plan = 'has_plan';
        
        // Mail the code
        $toEmail = $user->email;
        Mail::to($toEmail)->send(new PlanGrantedMail($user));
        
        return $user->save();

    }
    public function moveToPending($user_id){
        $user = User::find($user_id);
        $user->subscription_start =  null;
        $user->subscription_end = null;
        $user->plan = 'pending';
        return $user->save();
    }
    public function unsubscribe($user_id){
        $user = User::find($user_id);
        $user->subscription_start =  null;
        $user->subscription_end = null;
        $user->plan = 'no_plan';
        $user->plan_name = null;
        return $user->save();
    }

    public function toggleExpiredCheck($user_id){
        $user = User::find($user_id);
        if($user->expired_check == 'false'){
            $user->expired_check = 'true';
            return $user->save();
        }
        $user->expired_check = 'false';
        return $user->save();
    }
}

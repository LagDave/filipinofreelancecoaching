<?php

namespace App\Http\Controllers;

use App\User;
use App\Proof;
use Carbon\Carbon;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    
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
            )->orderBy('id', 'desc')->get();
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'monthly';
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'yearly';
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
                $user->save();
            }else if($user->plan == 'expired' || $user->plan == 'has_plan'){
                // Set user to pending renewal
                $user->plan = 'renewal';
                $user->plan_name = 'lifetime';
                $user->latest_plan_update = Carbon::now()->format('m-d-Y');
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
        return User::where('plan', 'no_plan')->orderBy('updated_at', 'asc')->get();
    }
    public function pending(){
        return User::where('plan', 'pending')->orderBy('updated_at', 'asc')->with([
            'proofs'=>function($q){
                $q->orderBy('id', 'desc');
            }
        ])->get();
    }
    public function subscribed(){
        return User::where('plan', 'has_plan')->orderBy('updated_at', 'asc')->get();
    }
    public function expired(){
        return User::where('plan', 'expired')->orderBy('updated_at', 'asc')->get();
    }
    public function renewal(){
        return User::where('plan', 'renewal')->orderBy('updated_at', 'asc')->with([
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
            $user->plan_name = 'monthly';
        }else if($grant_type == 'yearly'){
            $user->subscription_start =  Carbon::now()->format('m-d-Y');
            $user->subscription_end = Carbon::now()->addDays(366)->format('m-d-Y');
            $user->plan_name = 'yearly';
        }else if($grant_type == 'lifetime'){
            $user->subscription_start =  'lifetime';
            $user->subscription_end = 'lifetime';
            $user->plan_name = 'lifetime';
        }

        $user->plan = 'has_plan';
        return $user->save();
        // set subscription end
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
}

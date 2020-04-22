<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function dashboard(){
        return view ('home');
    }
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
        $today =  Carbon::now()->setTimezone('GMT+8')->format('m-d-Y');

        return User::where('subscription_end', '>', $today)->orderBy('updated_at', 'asc')->get();
    }
    public function expired(){
        $today =  Carbon::now()->setTimezone('GMT+8')->format('m-d-Y');
        return User::where('subscription_end', '<=', $today)->orderBy('updated_at', 'asc')->get();
    }
    public function grant($user_id, $grant_type){
        // set subscription start
        $user = User::find($user_id);
        if($grant_type == 'monthly'){
            $user->subscription_start =  Carbon::now()->format('m-d-Y');
            $user->subscription_end = Carbon::now()->addDays(30)->format('m-d-Y');
            $user->plan = 'monthly';
        }else if($grant_type == 'yearly'){
            $user->subscription_start =  Carbon::now()->format('m-d-Y');
            $user->subscription_end = Carbon::now()->addDays(366)->format('m-d-Y');
            $user->plan = 'yearly';
        }else if($grant_type == 'lifetime'){
            $user->subscription_start =  'lifetime';
            $user->subscription_end = 'lifetime';
            $user->plan = 'lifetime';
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

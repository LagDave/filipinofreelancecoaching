<?php

namespace App\Http\Controllers;

use App\User;
use App\DailySale;
use Carbon\Carbon;
use App\WeeklySale;
use App\MonthlySale;
use App\StatisticsBase;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function manage_courses(){
        return view('admin.manage_courses');
    }
    public function manage_users(){
        return view('admin.manage_users');
    }
    public function statistics(){
        $users = User::all();
        
        $unsubscribed = User::where('plan', 'no_plan')->get();
        $pending = User::where('plan', 'pending')->get();
        $subscribed = User::where('plan', 'has_plan')->get();
        $expired = User::where('plan', 'expired')->get();
        $renewal = User::where('plan', 'renewal')->get();

        $monthlySubscribed = sizeof($subscribed->filter(function($student){
            return $student->plan_name == 'monthly';
        }));
        $yearlySubscribed = sizeof($subscribed->filter(function($student){
            return $student->plan_name == 'yearly';
        }));
        $lifetimeSubscribed = sizeof($subscribed->filter(function($student){
            return $student->plan_name == 'lifetime';
        }));


        
        //  FOR DAILY SALES CHART
        $week = StatisticsBase::firstWhere('name', 'week')->value;
        $daily_sales = DailySale::where('week', $week)->orderBy('id', 'asc')->get();
        
        // For WEEKLY SALES CHART
        $month = StatisticsBase::firstWhere('name', 'month')->value;
        $weekly_sales = WeeklySale::where('month', $month)->orderBy('id', 'asc')->get();
        
        // For Monthly Sales chart
        $year = StatisticsBase::firstWhere('name', 'year')->value;
        $monthly_sales = MonthlySale::where('year', $year)->orderBy('id', 'desc')->get();

        return view('admin.statistics', compact(
            'users',
            'unsubscribed',
            'pending',
            'subscribed',
            'expired',
            'renewal',
            'monthlySubscribed',
            'yearlySubscribed',
            'lifetimeSubscribed',
            'daily_sales',
            'weekly_sales',
            'monthly_sales'
        ));
    }
}

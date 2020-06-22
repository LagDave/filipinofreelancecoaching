<?php

namespace App\Console\Commands;

use App\User;
use App\DailySale;
use Carbon\Carbon;
use App\StatisticsBase;
use Illuminate\Console\Command;

class SetDailySale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sale:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $yesterday = Carbon::yesterday()->format('m-d-Y');
        
        $users = User::all();
        $monthly = User::where([
            'plan_name'=> 'monthly',
            'latest_plan_update'=> $yesterday
        ])->get();
        $yearly = User::where([
            'plan_name'=> 'yearly',
            'latest_plan_update'=> $yesterday
        ])->get();
        $lifetime = User::where([
            'plan_name'=> 'lifetime',
            'latest_plan_update'=> $yesterday
        ])->get();

        $week = StatisticsBase::firstWhere('name', 'week')->value;

        DailySale::create([
            'day'=> $yesterday,
            'monthly_subscribed'=> sizeof($monthly),
            'yearly_subscribed'=> sizeof($yearly),
            'lifetime_subscribed'=> sizeof($lifetime),
            'week' => $week
        ]);
    }
}

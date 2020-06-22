<?php

namespace App\Console\Commands;

use App\DailySale;
use App\WeeklySale;
use App\StatisticsBase;
use Illuminate\Console\Command;

class SetWeeklySale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sale:weekly';

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
        $current_week = StatisticsBase::firstWhere('name', 'week');
        $current_weeks_daily_data = DailySale::where('week', $current_week->value)->orderBy('id', 'asc')->get();

        $current_week_revenue_counter = 0;
        // Loop through the data and calculate
        foreach($current_weeks_daily_data as $data){
            $counter = 0;
            $counter = $counter + $data->monthly_subscribed * 399;
            $counter = $counter + $data->yearly_subscribed * 999;
            $counter = $counter + $data->lifetime_subscribed * 1999;
            $current_week_revenue_counter = $current_week_revenue_counter + $counter;
        }
        WeeklySale::create([
            'week'=>$current_week->value,
            'revenue'=> $current_week_revenue_counter,
            'month'=> StatisticsBase::firstWhere('name', 'month')->value
        ]);

        $current_week->value = $current_week->value + 1;
        $current_week->save();
    }
}

<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\WeeklySale;
use App\MonthlySale;
use App\StatisticsBase;
use Illuminate\Console\Command;

class SetMonthlySale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sale:monthly';

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
        // Set Week back to 0
        $week = StatisticsBase::firstWhere('name', 'week');
        $week->value = 0;
        $week->save();

        // Get the total revenue for the month
        $current_month = Carbon::parse(StatisticsBase::firstWhere('name', 'month')->value);
        $current_month_formatted = $current_month->format('F');
        $next_month = $current_month->addMonth()->format('F');
        
        $current_months_weekly_data = WeeklySale::where('month', $current_month_formatted)->get();
        $current_month_revenue_counter = 0;

        foreach($current_months_weekly_data as $data){
            $current_month_revenue_counter = $current_month_revenue_counter + $data->revenue;
        }
        
        MonthlySale::create([
            'month'=>$current_month_formatted,
            'revenue'=>$current_month_revenue_counter,
            'year'=>StatisticsBase::firstWhere('name', 'year')->value
        ]);

        // Update Current month
        $current_month = StatisticsBase::firstWhere('name', 'month');
        $current_month->value = $next_month;
        $current_month->save();

    }
}

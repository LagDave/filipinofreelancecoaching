<?php

namespace App\Console\Commands;

use \App\User;
use Carbon\Carbon;
use App\Mail\ExpiredUserMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ManageExpiredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:manageExpiredUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will manage users that could already be expired';

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
        
        $today = Carbon::now()->setTimezone('GMT+8')->format('m-d-Y');
        $users = User::where('subscription_end', $today)->orderBy('updated_at')->get();
        foreach($users as $user){
            $user->plan = 'expired';
            $user->save();
            // Mail the code
            $toEmail = $user->email;
            Mail::to($toEmail)->send(new ExpiredUserMail($user));

        }
    }
}

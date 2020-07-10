<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class SubscriptionExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command is used to schedule the user subscription to change from active to expired automatically everyminute ';

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
        //here we put the code to update the users table when the scheduler executes
        $users = User::where('expire',0)->get();        //get collection of users
        foreach($users as $user) {
            $user->update(['expire' => 1]);
        }
    }
}

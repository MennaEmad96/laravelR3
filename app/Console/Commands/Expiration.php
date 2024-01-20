<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// 1) add model
use App\Models\User;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // 2) change name
    protected $signature = 'user:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 3)add these lines
        $users = User::where("expired", 1)->get();
        foreach($users as $row){
            //User::where("id", $row['id])->update(["expired" => 0]);
            $row->update(["expired"=> 0]);
        }   
    }
}

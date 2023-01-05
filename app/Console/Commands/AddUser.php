<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Address;
class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'add:user {user_id}';
    protected $signature = 'add:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;

        // $user = Address::factory()->create();

        // $this->info(string:"$user->country created successfully");

        // try{
        //     $user = new Address();
        //     $user->user_id = $this->argument(key:"user_id");
        //     $user->country = "Tamil Nadu";
        //     $user->save();
        //     $this->info(string:"$user->country created successfully");

        // }catch(\Exception $e){
        //     $this->error($e->getMessage());
        // }

        $user_id = $this->ask(question:"Enter Your User Id ?");
        $country = $this->anticipate('What is your country?', ['India', 'Pakistan']);
        // $country = $this->ask(question:"Enter Your country ?");
        if($this->confirm(question:"Do You Wish to Continue".true)){
            $user = new Address();
            $user->user_id = $user_id;
            $user->country = $country;
            $user->save();
            $this->info(string:"$user->country created successfully");
        }else{
            $this->warn(string:"You have Cancelled to add new Address");
        }
        
    }
}

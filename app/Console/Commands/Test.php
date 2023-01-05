<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:person';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Added';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $data['name'] = 'task schedule';
        $data['email'] = 'task'.time().'@gmail.com';
        $data['project_id'] = '5';
        $data['password'] = '12345';
        \DB::table('users')->insert($data);

        $this->info("Success");
    }
}

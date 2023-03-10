<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single dumy records

        // DB::table('test')->insert([
        //     'name' => 'seeder1',
        //     'age' => '20'
        // ]);
        
        //Multiple  dumy records
        // $faker = Faker::create();
        // foreach(range(1,10) as $index){
        //     DB::table('test')->insert([
        //         'name' => $faker->name,
        //         'age' => rand(11,99)
        //     ]);
        // }
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->date(),
                'password' => $faker->password(),
                'created_at' => $faker->date(),
                'updated_at' =>$faker->date(),
            ]);
        }
    }
}

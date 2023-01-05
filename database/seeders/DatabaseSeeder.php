<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Database\Factories\Factory;
use App\Models\User;    
use App\Models\Address;    

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
// single class
        // $this->call([
        //     TestSeeder::class
        // ]);
// multiple class
        // $this->call([
        //     TestSeeder::class,
        //     UserSeeder::class
        // ]);

        // User::factory(3)->create();
        Address::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([FishSeeder::class, OrderSeeder::class]);
        // \App\Models\User::factory(10)->create();
        User::create([
            "username" => "fishAdmin",
            "email" => "fishAdmin@gmail.com",
            "password" => bcrypt("fishAdmin123"),
            "level" => 0,
        ]);
        User::create([
            "username" => "user1",
            "email" => "user1@gmail.com",
            "password" => bcrypt("password"),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

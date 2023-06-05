<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fishes = [
            [
                'name' => 'Fish 1',
                'price' => 10000,
                'image' => 'fish1.jpg',
            ],
            [
                'name' => 'Fish 2',
                'price' => 15250,
                'image' => 'fish2.jpg',
            ],
            [
                'name' => 'Fish 3',
                'price' => 8750,
                'image' => 'fish3.jpg',
            ],
        ];

        // Looping data dummy untuk dimasukkan ke tabel 'fish'
        foreach ($fishes as $fish) {
            DB::table('fish')->insert($fish);
        }
    }
}

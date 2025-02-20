<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Category::create([
        //     'name' => 'valueu tzst 1',

        // ]);

        // Category::create([
        //     'name' => 'valeu ',
        // ]);


        Category::factory()->count(50)->create(); 

    }
}

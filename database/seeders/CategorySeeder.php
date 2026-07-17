<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

// use App\Models\CategorySeeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'label' => 'TAFE',
                'tasks' => [1],

            ],

        ];
        foreach ($categories as $category) {

            Category::updateOrCreate([
                'label' => $category['label'],

            ]
            );

        }
    }
}

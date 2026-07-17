<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Eisenhower Matrix
         * https://asana.com/resources/eisenhower-matrix
         */
        $badges= [
          ['Important Urgent', 'green'],
          ['Important Unurgent', 'yellow'],
          ['Unimportant Urgent', 'blue'],
          ['Unimportant Unurgent', 'red' ],
        ];

        foreach ($badges as $badge) {
             Badge::updateOrCreate(
                ['label' => $badge[0]],
                ['color' => $badge[1]],
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'label' => 'make quinoa',
                'due' => fake()->date('1984-3-5'),
                'badge' => 2,
            ],
            [
                'label' => 'finish AT2',
                'due' => Carbon::now(),
                'badge' => 1,
            ],
            [
                'label' => 'redesign website',
                'due' => null,
                'badge' => 3,
            ],
            [
                'label' => 'visit library',
                'due' => fake()->date('2026-7-4'),
                'badge' => 2,
            ],

        ];
        foreach ($tasks as $task) {

                        Task::updateOrCreate([
                            'user_id' => 100,
                            'label' => $task['label'],
                            'completed' =>fake()->boolean(),
                            'description' => fake()->words(5, true),
                            'due' => $task['due'],
                            'badge' => $task['badge'],
            ]
                        );

        }

    }
}

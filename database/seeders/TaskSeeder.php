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
                'due' => fake()->date(),
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

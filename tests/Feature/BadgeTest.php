<?php

use App\Models\Task;
use App\Models\User;

test('users can add a badge', function () {

    $user = User::factory()->create();
    $badge = 0;

    $this->actingAs($user)->post('/tasks/', ['label' => 'test']
    )->assertStatus(302);

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge)->toBeTrue();

});

test('users can replace a badge', function () {

    $user = User::factory()->create();

    $badge1 = 0;
    $badge2 = 1;

    $this->actingAs($user)->post('/tasks/', ['label' => 'test']
    )->assertStatus(302);

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge1,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge1)->toBeTrue();

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge2,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge1)->toBeFalse()
        ->and(Task::find(1)->badge == $badge2)->toBeTrue();

});

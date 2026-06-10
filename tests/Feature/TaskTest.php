<?php

use App\Models\Badge;
use App\Models\Task;
use App\Models\User;

test('only authenticated users can access tasks', function () {
    $this->get('/tasks')->assertStatus(302);

    $user = User::factory()->create();
    $this->actingAs($user)->get('/tasks')->assertStatus(200);

});

test('users can create tasks', function () {

    expect(Task::find(1) == null)->toBeTrue();

    $user = User::factory()->create();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);

    expect(Task::find(1) != null)->toBeTrue();
});

test('users can delete tasks', function () {

    $user = User::factory()->create();

    $task = Task::factory()->create();

    expect(Task::find($task->id) == null)->toBeFalse();

    $this->actingAs($user)->delete('/tasks/'.$task->id,
    )->assertStatus(302);

    expect(Task::find($task->id) == null)->toBeTrue();

});

test('users can edit tasks', function () {

    $user = User::factory()->create();

    $task = Task::factory()->create();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'label' => 'wow!!!!!!',
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->label == 'wow!!!!!!')->toBeTrue();

});

test('users can add a badge', function () {

    $user = User::factory()->create();

    $task = Task::factory()->create();

    $badge = Badge::factory()->create();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->badge == $badge->id)->toBeTrue();

});

test('users can remove a badge', function () {

    $user = User::factory()->create();

    $task = Task::factory()->create();

    $badge = Badge::factory()->create();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->badge == $badge->id)->toBeTrue();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'badge' => '',
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->badge == $badge->id)->toBeFalse();

});

test('users can replace a badge', function () {

    $user = User::factory()->create();

    $task = Task::factory()->create();

    $badge = Badge::factory()->create();
    $badge2 = Badge::factory()->create();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->badge == $badge->id)->toBeTrue();

    $this->actingAs($user)->patch('/tasks/'.$task->id,
        [
            'badge' => $badge2->id,
        ]
    )->assertStatus(302);

    expect(Task::find($task->id)->badge == $badge->id)->toBeFalse()
        ->and(Task::find($task->id)->badge == $badge2->id)->toBeTrue();

});

<?php

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

    expect(Task::find(1) == null)->toBeTrue();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);

    $this->actingAs($user)->delete('/tasks/1'
    )->assertStatus(302);

    expect(Task::find(1) == null)->toBeTrue();

});

test('users can edit tasks', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);

    $this->actingAs($user)->patch('/tasks/1',
        [
            'label' => 'wow!!!!!!',
        ]
    )->assertStatus(302);

    expect(Task::find(1)->label == 'wow!!!!!!')->toBeTrue();

});

test('users cant edit others tasks', function () {

    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $this->actingAs($user1)->get('/tasks/create',
    )->assertStatus(302);

    $this->actingAs($user2)->delete('/tasks/1',
    )->assertStatus(403);

    $this->actingAs($user1)->delete('/tasks/1',
    )->assertStatus(302);

});

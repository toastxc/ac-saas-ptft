<?php

use App\Models\Badge;
use App\Models\Task;
use App\Models\User;

test('users can add a badge', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);


    $badge = Badge::factory()->create();

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge->id)->toBeTrue();

});

test('users can remove a badge', function () {


    $user = User::factory()->create();




    $badge = Badge::factory()->create();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);


    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);




    expect(Task::find(1)->badge == $badge->id)->toBeTrue();

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => '',
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge->id)->toBeFalse();

});

test('users can replace a badge', function () {

    $user = User::factory()->create();

    $badge = Badge::factory()->create();
    $badge2 = Badge::factory()->create();

    $this->actingAs($user)->get('/tasks/create',
    )->assertStatus(302);



    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge->id,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge->id)->toBeTrue();

    $this->actingAs($user)->patch('/tasks/1',
        [
            'badge' => $badge2->id,
        ]
    )->assertStatus(302);

    expect(Task::find(1)->badge == $badge->id)->toBeFalse()
        ->and(Task::find(1)->badge == $badge2->id)->toBeTrue();

});

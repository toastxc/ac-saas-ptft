<?php

use App\Models\Badge;
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

test('users can create a badge', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->post('/badges/', ['label' => 'test', 'color' => 'red']
    )->assertStatus(302);

    expect(Badge::find(1));

});


test('users can\'t create a badge with a long name', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->post('/badges/', ['label' => 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'color' => 'red']
    )->assertStatus(302);

    expect(Badge::find(1))->toBeNull();


});

test('users can change color of badge', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->post('/badges/', ['label' => 'test', 'color' => 'red']
    )->assertStatus(302);

    $this->actingAs($user)->patch('/badges/1', ['color' => 'blue']
    )->assertStatus(302);

    expect(Badge::find(1)->color)->toBe('blue');


});

test('users can change color and label of badge', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->post('/badges/', ['label' => 'test', 'color' => 'red']
    )->assertStatus(302);

    $this->actingAs($user)->patch('/badges/1', ['color' => 'blue', 'label' => 'test2']
    )->assertStatus(302);

    $request = Badge::find(1);

    expect($request->color)->toBe('blue');
    expect($request->label)->toBe('test2');


});

test('users can delete their own badge', function () {

    $user = User::factory()->create();

    $this->actingAs($user)->post('/badges/', ['label' => 'test', 'color' => 'red']
    )->assertStatus(302);

    expect(Badge::find(1));
    $this->actingAs($user)->delete('/badges/1')->assertStatus(302);
    expect(Badge::find(1))->toBeNull();


});

test('users can\'t delete other users badges', function () {

    $user1 = User::factory()->create();

    $user2 = User::factory()->create();

    $this->actingAs($user1)->post('/badges/', ['label' => 'test', 'color' => 'red']
    )->assertStatus(302);


    expect(Badge::find(1));
    $this->actingAs($user2)->delete('/badges/1')->assertStatus(302);
    expect(Badge::find(1));


});

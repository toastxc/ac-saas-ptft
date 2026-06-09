<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = Auth::id();

        $tasks = DB::table('tasks')->where('user', $id)->limit(20)->get();

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = \App\Models\Task::find($id);

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $task = \App\Models\Task::find($id);

        /*
         * checkboxes are null by default
         *
         * 'checkbox' specifies if the form updates the checkbox or not
         */
        if (isset($request->checkbox)) {
            if ($request->completed) {
                $task->completed = true;
            } else {
                $task->completed = false;
            }
            /*
             * assumes main edit page
             */
        } else {

            $request->validate([
                'label' => ['string', 'max:32'],
                'family_name' => ['string', 'max:128'],
                // completed or null
                'completed' => ['nullable', 'string', 'min:9', 'max:9'],
            ]);

            if ($request->completed) {
                $task->completed = true;
            } else {
                $task->completed = false;
            }

            $task->update($request->all());

        }

        $task->save();

        return redirect(route('tasks.index', absolute: false));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

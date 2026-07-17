<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = User::find(Auth::id())->tasks;
        $badges = Badge::all();

        return view('task.index', ['tasks' => $tasks, 'badges' => $badges]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task;
        $task->label = 'new task';
        $task->user_id = Auth::id();
        $task->completed = false;
        $task->save();

        return redirect(route('tasks.edit', ['task' => $task], absolute: false));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return redirect(route('tasks.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return redirect(route('tasks.index', absolute: false));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = $this->bouncer($id);

        return view('task.edit', ['task' => $task, 'badges' => Badge::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $task = $this->bouncer($id);

        if (isset($request->checkbox)) {
            $request->validate([
                'completed' => ['nullable', 'string', 'min:9', 'max:9'],
            ]);
            $task->completed = $request->completed == 'completed';
            /*
             * assumes main edit page
             */
        } else {

            $request->validate([
                'label' => ['string', 'max:32'],
                'description' => ['string', 'max:128', 'nullable'],
                // completed or null
                'completed' => ['nullable', 'string', 'min:9', 'max:9'],
                'badge' => ['int', 'nullable'],
                'due' => ['date', 'nullable'],
            ]);

        }
        $task->due = $request->due;
        $task->update($request->all());




        return redirect(route('tasks.index', absolute: false));
    }

    public function bouncer(string $id)
    {
        $task = Task::find($id);
        if ($task == null) {
            abort(404);
        }
        if ($task->user_id != Auth::id()) {
            abort(403);
        }

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->bouncer($id);

        Task::destroy($id);

        return redirect(route('tasks.index', absolute: false));
    }
}

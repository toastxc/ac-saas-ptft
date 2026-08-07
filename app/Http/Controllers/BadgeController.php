<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $badges = Badge::where('user_id', Auth::id())->get();

        return view('badge.index', ['badges' => $badges]);
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

        $request->validate([
            'label' => ['string', 'min:1', 'max:32'],
        ]);

        $badge = new Badge;
        $badge->label = $request->label;
        $badge->user_id = Auth::id();
        $badge->color = 'red';
        $badge->save();

        return redirect(route('badges.index'));

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
        return view('badge.edit', ['badge' => Badge::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $badge = Badge::find($id);

        $request->validate([

            'color' => ['nullable', 'string'],
            'label' => ['nullable', 'string', 'min:1', 'max:16'],
        ]);

        if ($request->color != null) {
            $badge->color = $request->color;
        }

        if ($request->label != null) {
            $badge->label = $request->label;
        }

        $badge->save();

        return redirect(route('badges.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Badge::destroy($id);

        Task::where('badge', $id)->update(['badge' => null]);

        return redirect(route('badges.index', absolute: false));
    }
}

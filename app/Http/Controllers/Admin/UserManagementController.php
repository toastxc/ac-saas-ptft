<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::paginate(10);

        return view('admin.users.index')
            ->with('users', $users);
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

        $user = User::find($id);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);


        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        print($id);

        $request->validate([
            'given_name' => ['nullable', 'string', 'max:128'],
            'family_name' => ['nullable', 'string', 'max:128'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);


        $user = User::find($id);

        if (isset($request->given_name) && $request->given_name !== '') {
            $user->given_name = $request->given_name;
        }
        if (isset($request->family_name) && $request->family_name !== '') {
            $user->family_name = $request->family_name;
        }
        if (isset($request->email) && $request->email !== '') {
            $user->email = $request->email;
        }

        $user->save();


        return redirect(route('admin.users.show', $user, absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $request->validate([
            'confirm' => ['nullable', 'string'],
        ]);


        if ($request->confirm == "confirm") {
            User::destroy($id);
            return redirect(route('admin.users.index', absolute: false));

        } else {
            $user = User::find($id);
            return view('admin.users.destroy', [
                'user' => $user
            ]);
        }

    }

    public function destroy_confirmed(string $id)
    {

        return redirect(route('admin.users.index', absolute: false));
    }
}

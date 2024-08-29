<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\DashboardController;

class UserController extends Controller
{
    /**
     * Display all existing resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('users.form', [
            'user' => $user,
            'meta_page' => [
                'title' => 'Create new user',
                'method' => 'post',
                'url' => '/users',
                'submit_text' => 'Create',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $articles = $user->articles;
        return view('users.show', compact('user', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.form', compact('user'), [
            'meta_page' => [
                'title' => 'Edit user: ' . $user->name,
                'method' => 'put',
                'url' => '/users/' . $user->id,
                'submit_text' => 'Edit',
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard', ['activeTable' => 'Users'])->with('success', 'User deleted successfully.');
    }
}

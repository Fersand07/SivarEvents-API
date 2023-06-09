<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::paginate(
            $request->get('per_page')
        );

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:20'],
            'username' => ['required', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255'],
            'cellphone' => ['required']
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'cellphone' => $request->get('cellphone')
        ]);

        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

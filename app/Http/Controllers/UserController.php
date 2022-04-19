<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500'
        ]);

        if ($request->filled('first_name')) {
            User::where('username', $user->username)->update([
                'first_name' => $validatedData['first_name']
            ]);
        } else {
            User::where('username', $user->username)->update([
                'first_name' => null
            ]);
        }

        if ($request->filled('last_name')) {
            User::where('username', $user->username)->update([
                'last_name' => $validatedData['last_name']
            ]);
        } else {
            User::where('username', $user->username)->update([
                'last_name' => null
            ]);
        }

        if ($request->filled('bio')) {
            User::where('username', $user->username)->update([
                'bio' => $validatedData['bio']
            ]);
        } else {
            User::where('username', $user->username)->update([
                'bio' => null
            ]);
        }

        return redirect()->route('users.show', ['user'=>$user->username])
            ->with('message', 'Your Profile Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

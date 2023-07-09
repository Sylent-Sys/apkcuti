<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('user.index', [
            'user' => User::all()->load('departemen')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.add', [
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->isKapDer == "on") {
            $request->merge([
                'role' => 2
            ]);
        } else {
            $request->merge([
                'role' => 0
            ]);
        }
        User::create($request->collect()->except(['_token','isKapDer'])->all());
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('user.edit', [
            'user' => $user,
            'departemen' => Departemen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $password = $request->password == '' || $request->password == null ? $user->password : bcrypt($request->password);
        $request->merge([
            'password' => $password
        ]);
        if ($request->isKapDer == "on") {
            $user->role = 2;
        } else {
            $user->role = 0;
        }
        $user->update($request->collect()->except(['_token', 'isKapDer'])->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back();
    }
}

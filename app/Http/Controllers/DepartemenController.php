<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [];
        if (Auth::user()->role == 1) {
            $data['departemen'] = Departemen::all()->load('user');
        } else {
            $data['departemen'] = User::where('departemen_id', Auth::user()->departemen_id)->where('role', '!=', '1')->get();
            $data['user'] = User::where('departemen_id', '=', null)->where('role', '!=', '1')->get();
        }
        return view('departemen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departemen.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->file('logo')?->isValid()){
            $logo = $request->file('logo')->store('public/logo_departemen');
        }
        $departemen = Departemen::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'logo' => $logo ?? null,
        ]);
        $departemen->save();
        return redirect()->route('departemen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        //
        return view('departemen.admin.edit', ['data' => $departemen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        //
        if($request->file('logo')?->isValid()){
            if($departemen->logo != null) {
                Storage::delete($departemen->logo);
            }
            $logo = $request->file('logo')->store('public/logo_departemen');
        }
        $departemen->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'logo' => $logo ?? $departemen->logo,
        ]);
        $departemen->save();
        return redirect()->route('departemen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        //
        if($departemen->logo != null) {
            Storage::delete($departemen->logo);
        }
        $departemen->delete();
        return redirect()->route('departemen.index');
    }
}

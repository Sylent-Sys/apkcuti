<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [];
        if (Auth::user()->role == 0) {
            $data['cuti'] = Cuti::where('created_by', Auth::user()->id)->get()->load(['createdByUser', 'reviewByUser']);
        } else {
            $data['cuti'] = Cuti::whereRelation('createdByUser', 'departemen_id', Auth::user()->departemen_id)->get()->load(['createdByUser', 'reviewByUser']);
        }
        return view('cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cuti.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->file('lampiran')?->isValid()) {
            $lampiran = $request->file('lampiran')->store('public/lampiran_user');
        }
        Cuti::create([
            'created_by' => Auth::user()->id,
            'lampiran' => $lampiran ?? null,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
        ])->save();
        return redirect()->route('cuti.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
        if ($request->status == 1) {
            $lama_cuti = Carbon::parse($cuti->tanggal_selesai)->diffInDays(Carbon::parse($cuti->tanggal_mulai)) + 1;
            if($cuti->createdByUser->saldo_cuti - $lama_cuti < 0){
                $cuti->update([
                    'status' => 2,
                    'review_by' => Auth::user()->id,
                    'catatan' => 'Saldo cuti tidak mencukupi',
                ]);
                return redirect()->route('cuti.index');
            }
            $cuti->createdByUser()->update([
                'saldo_cuti' => $cuti->createdByUser->saldo_cuti - $lama_cuti,
            ]);
        }
        $cuti->update($request->collect()->except(['_token', '_method'])->all());
        return redirect()->route('cuti.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}

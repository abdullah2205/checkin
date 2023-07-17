<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckIn;
use Carbon\Carbon;

class CheckInController extends Controller
{
    public function index()
    {
        $checkIns = CheckIn::all();
        return view('checkins.index', compact('checkIns'));
    }

    public function checkIn()
    {
        setlocale(LC_TIME, 'id_ID.utf8');

        $now = Carbon::now();
        
        $today = date('Y-m-d');
        $lastCheckIn = CheckIn::whereDate('tanggal', $today)->first();

        if ($lastCheckIn) {
            return redirect()->back()->with('error', 'Anda telah melakukan check-in sebelumnya hari ini.');
        }

        $checkIn = new CheckIn;
        $checkIn->hari = $now->isoFormat('dddd');
        $checkIn->tanggal = date('Y-m-d');
        $checkIn->jam = $now->isoFormat('HH:mm:ss');
        
        $lastCheckIn = CheckIn::latest()->first();
        $totalDays = $lastCheckIn ? $lastCheckIn->total_hari + 1 : 1;
        $checkIn->total_hari = $totalDays;
        $checkIn->save();

        return redirect()->route('checkins.index')
            ->with('success', 'Check-in berhasil ditambahkan.');
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

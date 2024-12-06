<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pieteikums;

class DashboardController 
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function adminIndex()
{
    // Fetch pending pieteikumi with related user and computer
    $pendingPieteikumi = Pieteikums::with(['user', 'computer'])
                                    ->where('status', 'pending')
                                    ->get();


    return view('auth.admin-dashboard', compact('pendingPieteikumi'));
}

public function approvePieteikums($id)
{
    // Find the pieteikums by ID
    $pieteikums = Pieteikums::findOrFail($id);

    // Move to rezervacija table if approved
    Rezervacija::create([
        'user_id' => $pieteikums->user_id,
        'computer_id' => $pieteikums->Computers,
        'start_time' => $pieteikums->start_time,
        'end_time' => $pieteikums->end_time,
    ]);

    // Update status to approved
    $pieteikums->status = 'approved';
    $pieteikums->save();

    return redirect()->route('admin.dashboard')->with('success', 'Reservation approved!');
}

public function denyPieteikums($id)
{
    // Find the pieteikums by ID
    $pieteikums = Pieteikums::findOrFail($id);

    // Update status to denied
    $pieteikums->status = 'declined';
    $pieteikums->save();

    return redirect()->route('admin.dashboard')->with('error', 'Reservation denied!');
}

}


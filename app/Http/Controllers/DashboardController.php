<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pieteikums;
use App\Models\Rezervacija;
use Illuminate\Support\Facades\Log;


class DashboardController 
{
    public function index()
    {
        return view('dashboard'); 
    }

//     public function adminIndex()
// {

//     $pendingPieteikumi = Pieteikums::with(['user', 'computer'])
//                                     ->where('status', 'pending')
//                                     ->get();


//     return view('auth.admin-dashboard', compact('pendingPieteikumi'));
// }

public function adminIndex()
{
    $pendingPieteikumi = Pieteikums::with(['user', 'computer'])
        ->where('status', 'pending')
        ->get();

    return view('auth.admin-dashboard', compact('pendingPieteikumi'));
}


    public function approvePieteikums($id)
    {
        $pieteikums = Pieteikums::findOrFail($id);

        // Ensure the Pieteikums is not already processed
        if ($pieteikums->status !== 'pending') {
            return redirect()->route('admin.dashboard')->with('error', 'Pieteikums has already been processed.');
        }

        // Update the status to approved
        $pieteikums->status = 'approved';
        $pieteikums->save();

        // Create a Rezervacija directly
        Rezervacija::create([
            'Computer_id' => $pieteikums->Computers, // Assuming 'Computers' maps to the Computer_id field
            'pieteikuma_id' => $pieteikums->pieteikuma_id,
            'start_time' => $pieteikums->start_time,
            'end_time' => $pieteikums->end_time,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Pieteikums approved, and Rezervacija created successfully.');
    }

    public function denyPieteikums($id)
    {
        $pieteikums = Pieteikums::findOrFail($id);

        // Set the status to declined
        $pieteikums->status = 'declined';
        $pieteikums->save();

        return redirect()->route('admin.dashboard')->with('error', 'Reservation denied!');
    }

}


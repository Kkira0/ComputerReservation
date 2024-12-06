<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pieteikums;
use App\Models\Rezervacija;

class DashboardController 
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function adminIndex()
{

    $pendingPieteikumi = Pieteikums::with(['user', 'computer'])
                                    ->where('status', 'pending')
                                    ->get();


    return view('auth.admin-dashboard', compact('pendingPieteikumi'));
}

public function approvePieteikums($id)
{
    // Find the Pieteikums by ID
    $pieteikums = Pieteikums::find($id);
    echo '<script>console.log("fetched");</script>';
    echo '<script>window.alert("sometext");</script>';
    // Debugging: Check if pieteikums is found
    Log::info('Pieteikums fetched:', [$pieteikums]);
    
    if (!$pieteikums) {
        \Log::error('Pieteikums not found for ID: ' . $id);
        return redirect()->route('admin.dashboard')->with('error', 'Pieteikums not found.');
    }

    // Check if the pieteikums is already approved
    if ($pieteikums->status === 'approved') {
        \Log::info('Pieteikums already approved:', [$pieteikums]);
        return redirect()->route('admin.dashboard')->with('info', 'This pieteikums is already approved.');
    }

    // Update status to approved
    $pieteikums->status = 'approved';
    $pieteikums->save();

    // Get the associated computer from Pieteikums
    $computer = Computer::find($pieteikums->Computers);  // Assuming 'Computers' stores the computer ID

    // Debugging: Check if computer is found
    \Log::info('Computer fetched:', [$computer]);

    if (!$computer) {
        \Log::error('Computer not found for Computer ID: ' . $pieteikums->Computers);
        return redirect()->route('admin.dashboard')->with('error', 'Computer not found.');
    }

    // Check if the computer is already reserved during this time
    $existingReservation = Rezervacija::where('Computer_id', $computer->Computer_ID)
        ->where(function ($query) use ($pieteikums) {
            $query->whereBetween('start_time', [$pieteikums->start_time, $pieteikums->end_time])
                ->orWhereBetween('end_time', [$pieteikums->start_time, $pieteikums->end_time]);
        })
        ->first();

    if ($existingReservation) {
        \Log::info('Existing reservation found for computer during this time', [$existingReservation]);
        return redirect()->route('admin.dashboard')->with('error', 'This computer is already reserved during this time range.');
    }

    $rezervacija = new Rezervacija();
    $rezervacija->pieteikuma_id = $pieteikums->pieteikuma_id;
    $rezervacija->Computer_id = $computer->Computer_ID;
    $rezervacija->start_time = $pieteikums->start_time;
    $rezervacija->end_time = $pieteikums->end_time;

    \Log::info('Rezervacija data:', [
        'pieteikuma_id' => $rezervacija->pieteikuma_id,
        'Computer_id' => $rezervacija->Computer_id,
        'start_time' => $rezervacija->start_time,
        'end_time' => $rezervacija->end_time
    ]);

    $rezervacija->save();

    \Log::info('New Rezervacija created:', [$rezervacija]);

    return redirect()->route('admin.dashboard')->with('success', 'Rezervacija created successfully!');
}



public function denyPieteikums($id)
{
    $pieteikums = Pieteikums::findOrFail($id);

    $pieteikums->status = 'declined';
    $pieteikums->save();

    return redirect()->route('admin.dashboard')->with('error', 'Reservation denied!');
}

}


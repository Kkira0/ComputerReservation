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

    // Call the store method in Rezervacija_Controller to create a new reservation
    return redirect()->route('rezervacija.store', $pieteikums->id);
}

public function denyPieteikums($id)
{
    $pieteikums = Pieteikums::findOrFail($id);

    // Set the status to declined
    $pieteikums->status = 'declined';
    $pieteikums->save();

    return redirect()->route('admin.dashboard')->with('error', 'Pieteikums denied!');
}
}


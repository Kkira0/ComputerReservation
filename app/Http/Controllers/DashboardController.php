<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pieteikums;
use App\Models\Rezervacija;
use App\Models\Computer;
use Illuminate\Support\Facades\Log;


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

public function adminComputer(){
    $computers = Computer::with(['softwares', 'pc_parts'])->get();
        
    return view('auth.admin-computer', compact('computers'));
}



public function approvePieteikums($id)
{
    $pieteikums = Pieteikums::findOrFail($id);

    if ($pieteikums->status !== 'pending') {
        return redirect()->route('admin.dashboard')->with('error', 'Pieteikums has already been processed.');
    }

    $pieteikums->status = 'approved';
    $pieteikums->save();

    return redirect()->route('rezervacija.store', $pieteikums->id);
}

public function denyPieteikums($id)
{
    $pieteikums = Pieteikums::findOrFail($id);

    $pieteikums->status = 'declined';
    $pieteikums->save();

    return redirect()->route('admin.dashboard')->with('error', 'Pieteikums denied!');
}
}


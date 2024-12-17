<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use App\Models\Computer;
use App\Models\Pieteikums;
use Illuminate\Http\Request;

class Rezervacija_Controller
{

public function index()
{
    $rezervacijas = Rezervacija::with(['pieteikums', 'computer'])->get();
    return view('rezervacija.index', compact('rezervacijas'));
}

public function create()
{
    $pieteikumi = Pieteikums::all();
    $computers = Computer::all();
    return view('rezervacija.create', compact('pieteikumi', 'computers'));
}


public function store(Request $request)
{
    dd($request);
    $validated = $request->validate([
        'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',  
    ]);


    $pieteikums = Pieteikums::findOrFail($request->pieteikuma_id);

    
    $computer = $pieteikums->computer; 

    Rezervacija::create([
        'Computer_ID' => $computer->Computer_ID,   
        'pieteikuma_id' => $pieteikums->pieteikuma_id, 
        'start_time' => $pieteikums->start_time,      
        'end_time' => $pieteikums->end_time,        
    ]);
    

    return redirect()->route('admin.dashboard')->with('success', 'Rezervācija izveidota veiksmīgi!');
}


}


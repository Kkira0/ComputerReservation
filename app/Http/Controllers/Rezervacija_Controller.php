<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use App\Models\Computer;
use App\Models\Pieteikums;
use Illuminate\Http\Request;

class Rezervacija_Controller
{
    //
    public function index()
    {
        $rezervacijas = Rezervacija::with(['pieteikums', 'computer'])->get();
        return view('rezervacija.index', compact('rezervacijas'));
    }

    public function createFromPieteikums($pieteikumsId)
    {
        $pieteikums = Pieteikums::findOrFail($pieteikumsId);
    
        if ($pieteikums->status !== 'approved') {
            return redirect()->route('admin.dashboard')->with('error', 'Pieteikums must be approved first.');
        }
    
        $computer = Computer::find($pieteikums->Computers); 
        if (!$computer) {
            return redirect()->route('admin.dashboard')->with('error', 'The associated computer does not exist.');
        }

        $conflictingRezervacija = Rezervacija::where('Computer_id', $computer->Computer_ID)
            ->where(function ($query) use ($pieteikums) {
                $query->whereBetween('start_time', [$pieteikums->start_time, $pieteikums->end_time])
                    ->orWhereBetween('end_time', [$pieteikums->start_time, $pieteikums->end_time]);
            })->first();
    
        if ($conflictingRezervacija) {
            return redirect()->route('admin.dashboard')->with('error', 'This computer is already reserved for the selected time.');
        }
    
        $rezervacija = Rezervacija::create([
            'pieteikuma_id' => $pieteikums->pieteikuma_id,
            'Computer_id' => $pieteikums->Computers,
            'start_time' => $pieteikums->start_time,
            'end_time' => $pieteikums->end_time,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Rezervacija created successfully!');
    }
    
    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());

        $request->validate([
            'Computers' => 'required|exists:computer,Computer_ID', 
            'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        

        Log::info('Validated Data:', $validated); 
        $rezervacija = Rezervacija::create([
            'pieteikuma_id' => $pieteikums->pieteikuma_id,
            'Computer_id' => $pieteikums->Computers,
            'start_time' => $pieteikums->start_time,
            'end_time' => $pieteikums->end_time,
        ]);
        try {
            $rezervacija = new Rezervacija();
            $rezervacija->pieteikuma_id = $validated['pieteikuma_id'];
            $rezervacija->Computer_id = $validated['Computers']; 
            $rezervacija->start_time = $validated['start_time'];
            $rezervacija->end_time = $validated['end_time'];
        
            if ($rezervacija->save()) {
                Log::info('Rezervacija created successfully', ['id' => $rezervacija->id]);
                return redirect()->route('rezervacija.index')->with('success', 'Rezervacija created successfully.');
            } else {
                Log::error('Error saving rezervacija.');
                return back()->withErrors('Error saving rezervacija.');
            }
        } catch (\Exception $e) {
            Log::error('Error creating rezervacija:', ['message' => $e->getMessage()]);
            return back()->withErrors('Error creating rezervacija.');
        }
    }
}        

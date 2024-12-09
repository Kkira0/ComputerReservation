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
        // Retrieve all reservations with related data
        $rezervacijas = Rezervacija::with('pieteikums', 'computer')->get();

        return view('rezervacija.index', compact('rezervacijas'));
    }

    // Store a new reservation (triggered after Pieteikums approval)
    public function store(Pieteikums $pieteikums)
    {
        if ($pieteikums->status != 'approved') {
            return redirect()->route('admin.dashboard')->with('error', 'Pieteikums must be approved first.');
        }

        // Create a new reservation based on Pieteikums
        $rezervacija = Rezervacija::create([
            'pieteikuma_id' => $pieteikums->pieteikuma_id,
            'Computer_id' => $pieteikums->Computers, // Assuming this links the correct Computer
            'start_time' => $pieteikums->start_time,
            'end_time' => $pieteikums->end_time,
        ]);

        return redirect()->route('rezervacija.index')->with('success', 'Reservation created successfully.');
    }

    public function deny($id)
    {
        // Find the reservation by ID
        $rezervacija = Rezervacija::findOrFail($id);

        // Update the status of the reservation (you can modify this as needed)
        $rezervacija->status = 'denied'; // Assuming 'status' is a field on your Rezervacija model
        $rezervacija->save();

        // Redirect or return a response
        return redirect()->route('dashboard.index')->with('success', 'Reservation denied successfully.');
    }


    // View a specific reservation
    public function show($id)
    {
        $rezervacija = Rezervacija::with('pieteikums', 'computer')->findOrFail($id);

        return view('rezervacija.show', compact('rezervacija'));
    }
    // public function index()
    // {
    //     $rezervacijas = Rezervacija::all();
    //     return view('rezervacija.index', compact('rezervacijas'));
    // }

    // public function create()
    // {
    //     $computers = Computer::all(); 
    //     return view('rezervacija.create', compact('computers'));
    // }

    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'Computers' => 'required|exists:computer,Computer_ID', 
    //         'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',
    //         'start_time' => 'required|date',
    //         'end_time' => 'required|date|after:start_time',
    //     ]);
        
    
    //         Rezervacija::create([
    //             'Computers' => $request->Computer_ID,
    //             'pieteikuma_id' => $request->pieteikuma_id,
    //             'start_time' => $request->start_time,
    //             'end_time' => $request->end_time,
    //         ]);
    
    //         return redirect()->route('rezervacija.index')->with('success', 'Rezervacija request created!');
    //     }

    
 
 

    // public function createFromPieteikums($pieteikumsId)
    // {
    //     $pieteikums = Pieteikums::findOrFail($pieteikumsId);
    
    //     if ($pieteikums->status !== 'approved') {
    //         return redirect()->route('admin.dashboard')->with('error', 'Pieteikums must be approved first.');
    //     }
    
    //     $computer = Computer::find($pieteikums->Computers); 
    //     if (!$computer) {
    //         return redirect()->route('admin.dashboard')->with('error', 'The associated computer does not exist.');
    //     }

    //     $conflictingRezervacija = Rezervacija::where('Computer_id', $computer->Computer_ID)
    //         ->where(function ($query) use ($pieteikums) {
    //             $query->whereBetween('start_time', [$pieteikums->start_time, $pieteikums->end_time])
    //                 ->orWhereBetween('end_time', [$pieteikums->start_time, $pieteikums->end_time]);
    //         })->first();
    
    //     if ($conflictingRezervacija) {
    //         return redirect()->route('admin.dashboard')->with('error', 'This computer is already reserved for the selected time.');
    //     }
    
    //     $rezervacija = Rezervacija::create([
    //         'pieteikuma_id' => $pieteikums->pieteikuma_id,
    //         'Computer_id' => $pieteikums->Computers,
    //         'start_time' => $pieteikums->start_time,
    //         'end_time' => $pieteikums->end_time,
    //     ]);
    
    //     return redirect()->route('admin.dashboard')->with('success', 'Rezervacija created successfully!');
    // }
    


    // public function store(Request $request)
    // {
    //     Log::info('Request Data:', $request->all());

    //     $request->validate([
    //         'Computers' => 'required|exists:computer,Computer_ID', 
    //         'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',
    //         'start_time' => 'required|date',
    //         'end_time' => 'required|date|after:start_time',
    //     ]);
        

    //     Log::info('Validated Data:', $validated); 
    //     $rezervacija = Rezervacija::create([
    //         'pieteikuma_id' => $pieteikums->pieteikuma_id,
    //         'Computer_id' => $pieteikums->Computers,
    //         'start_time' => $pieteikums->start_time,
    //         'end_time' => $pieteikums->end_time,
    //     ]);
    //     try {
    //         $rezervacija = new Rezervacija();
    //         $rezervacija->pieteikuma_id = $validated['pieteikuma_id'];
    //         $rezervacija->Computer_id = $validated['Computers']; 
    //         $rezervacija->start_time = $validated['start_time'];
    //         $rezervacija->end_time = $validated['end_time'];
        
    //         if ($rezervacija->save()) {
    //             Log::info('Rezervacija created successfully', ['id' => $rezervacija->id]);
    //             return redirect()->route('rezervacija.index')->with('success', 'Rezervacija created successfully.');
    //         } else {
    //             Log::error('Error saving rezervacija.');
    //             return back()->withErrors('Error saving rezervacija.');
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error creating rezervacija:', ['message' => $e->getMessage()]);
    //         return back()->withErrors('Error creating rezervacija.');
    //     }
    // }
}        

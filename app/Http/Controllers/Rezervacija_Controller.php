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
        $rezervacija = Rezervacija::all();

        return view('rezervacija.index', ['rezervacija' => $rezervacija]);
    }

    public function create()
    {
        $computers = Computer::all();
        $pieteikums = Pieteikums::all();
        return view('rezervacija.create', compact('computers', 'pieteikums'));
    }

    public function createFromPieteikums($pieteikumsId)
    {
        $pieteikums = Pieteikums::findOrFail($pieteikumsId);

        if ($pieteikums->status !== 'approved') {
            return redirect()->route('admin.dashboard')->with('error', 'Only approved pieteikumi can be converted to reservations.');
        }

        return view('admin.rezervacija.create', compact('pieteikums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,Computer_ID',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $rezervacija = new Rezervacija();
        $rezervacija->Computer_ID = $request->computer_id;
        $rezervacija->Pieteikuma_id = $request->pieteikuma_id;
        $rezervacija->start_time = $request->start_time;
        $rezervacija->end_time = $request->end_time;
        $rezervacija->save();

        return redirect()->route('admin.dashboard')->with('success', 'Reservation created successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use App\Models\Computer;
use App\Models\Pieteikums;
use Illuminate\Http\Request;

class Rezervacija_Controller
{

// Show all reservations
public function index()
{
    $rezervacijas = Rezervacija::with(['pieteikums', 'computer'])->get();
    return view('rezervacija.index', compact('rezervacijas'));
}

// Show the form for creating a new reservation
public function create()
{
    $pieteikumi = Pieteikums::all();
    $computers = Computer::all();
    return view('rezervacija.create', compact('pieteikumi', 'computers'));
}

// Store a newly created reservation
public function store(Request $request)
{
    $validated = $request->validate([
        'Computer_ID' => 'required|exists:computer,Computer_ID',
        'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
    ]);

    // Create the reservation
    Rezervacija::create($validated);

    return redirect()->route('rezervacija.index')->with('success', 'Rezervācija izveidota veiksmīgi!');
}

}
?>
<script>

</script>

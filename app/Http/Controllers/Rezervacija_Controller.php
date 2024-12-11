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

// public function store(Request $request)
// {
//     $validated = $request->validate([
//         'Computer_ID' => 'required|exists:computer,Computer_ID',
//         'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',
//         'start_time' => 'required|date',
//         'end_time' => 'required|date|after:start_time',
//     ]);

//     Rezervacija::create([
//         'Computer_ID' => $request->Computer_ID,
//         'pieteikuma_id' => $request->pieteikuma_id,
//         'start_time' => $request->start_time,
//         'end_time' => $request->end_time,
//     ]);

//     return redirect()->route('rezervacija.index')->with('success', 'Rezervācija izveidota veiksmīgi!');
// }

public function store(Request $request)
{
    dd($request);
    $validated = $request->validate([
        'pieteikuma_id' => 'required|exists:pieteikums,pieteikuma_id',  
    ]);


    $pieteikums = Pieteikums::findOrFail($request->pieteikuma_id);

    
    $computer = $pieteikums->computer; 

    //dd($computer,$pieteikums);
    
    // if (!$computer) {
    //     return redirect()->back()->with('error', 'No associated computer found.');
    // }
    Rezervacija::create([
        'Computer_ID' => $computer->Computer_ID,   
        'pieteikuma_id' => $pieteikums->pieteikuma_id, 
        'start_time' => $pieteikums->start_time,      
        'end_time' => $pieteikums->end_time,          
    ]);
    

    return redirect()->route('admin.dashboard')->with('success', 'Rezervācija izveidota veiksmīgi!');
}


}
?>
<script>

</script>

<?php

namespace App\Http\Controllers;

use App\Models\Pieteikums;
use App\Models\Computer;
use App\Models\Software;
use App\Models\Rezervacija;
use Illuminate\Http\Request;

class Pieteikums_Controller
{
    public function index()
    {
        $pieteikums = Pieteikums::all();
        return view('pieteikums.index', compact('pieteikums'));
    }
 
    public function create()
    {
        $computers = Computer::all(); 
        return view('pieteikums.create', compact('computers'));
    }
 
    
//     public function store(Request $request)
// {
    
//         $request->validate([
//             'first_name' => 'required|string',
//             'last_name' => 'required|string',
//             'phone' => 'required|string',
//             'email' => 'required|email',
//             'start_time' => 'required|date',
//             'end_time' => 'required|date',
//             'computers' => 'required|exists:computer,Computer_ID',
//         ]);

//         Pieteikums::create([
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'phone' => $request->phone,
//             'email' => $request->email,
//             'start_time' => $request->start_time,
//             'end_time' => $request->end_time,
//             'Computers' => $request->computers,
//             'user_id' => $request->idUsers, 
//             'status' => 'pending',
//         ]);

//         return redirect()->route('pieteikums.index')->with('success', 'Pieteikums request created!');
//     }

public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'computers' => 'required|exists:computer,Computer_ID',
    ]);

    Pieteikums::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'Computers' => $request->computers,
        'user_id' => auth()->id(),  // Assuming the user is logged in
        'status' => 'pending',
    ]);

    return redirect()->route('pieteikums.index')->with('success', 'Pieteikums request created!');
}




    public function approve($id)
    {
        $pieteikums = Pieteikums::findOrFail($id);
        $pieteikums->status = 'approved';
        $pieteikums->save();

        return redirect()->route('admin.dashboard')->with('success', 'Pieteikums approved successfully!');
    }


    public function deny($id)
    {
        $pieteikums = Pieteikums::findOrFail($id);
        $pieteikums->status = 'declined';
        $pieteikums->save();

        return redirect()->route('admin.dashboard')->with('success', 'Pieteikums denied successfully!');
    }


}

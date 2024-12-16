<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class ComputerController 
{
    public function index()
    {
        $computers = Computer::with(['softwares', 'pc_parts'])->get();
        
        return view('computer.index', compact('computers'));
    }

    public function create()
{
 
    return view('computer.create'); 
}

public function store(Request $request)
{
    $request->validate([
        'PC_Name' => 'required|string|max:255',
        'Operating_System' => 'required|string|max:255',
        'Rinda' => 'required|int',
        'Colona' => 'required|int',
    ]);

    Computer::create($request->all());

    return redirect()->route('admin.computer')->with('success', 'New computer added successfully!');
}

    public function edit(Computer $computer)
    {
        return view('computer.edit', compact('computer'));
    }
     
    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'PC_Name' => 'required|string|max:255',
            'Operating_System' => 'required|string|max:255',
            'Rinda' => 'required|int',
            'Colona' => 'required|int',
        ]);

        $computer->update($request->all());

        return redirect()->route('admin.computer')->with('success', 'Computer updated successfully!');
    }


}

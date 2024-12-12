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

    public function edit(Computer $computer)
    {
        // Return the edit view with the computer data
        return view('computer.edit', compact('computer'));
    }
     
    public function update(Request $request, Computer $computer)
    {
        // Validate the incoming request data
        $request->validate([
            'PC_Name' => 'required|string|max:255',
            'Operating_System' => 'required|string|max:255',
            'Rinda' => 'required|int',
            'Colona' => 'required|int',
            // Add more fields as necessary
        ]);

        // Update the computer data in the database
        $computer->update($request->all());

        // Redirect to the index page or show a success message
        return redirect()->route('admin.computer')->with('success', 'Computer updated successfully!');
    }

}

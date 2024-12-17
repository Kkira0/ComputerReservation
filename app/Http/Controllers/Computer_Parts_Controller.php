<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PC_Parts;

use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class Computer_Parts_Controller
{
    //
    public function showAddExistingHardwareForm($Computer_ID)
    {
        $hardwareList = PC_Parts::all();

        $computer = Computer::find($Computer_ID);

        if (!$computer) {
            return redirect()->back()->with('error', 'Computer not found');
        }

        return view('pc_parts.add-existing', compact('computer', 'hardwareList'));
    }

    public function addExistingHardwareToComputer(Request $request, $Computer_ID)
    {
        $request->validate([
            'part_id' => 'required|exists:pc_parts,Part_ID',
        ]);

        $computer = Computer::find($Computer_ID);

        if (!$computer) {
            return redirect()->back()->with('error', 'Computer not found');
        }

        $hardwarePart = PC_Parts::find($request->part_id);

        if (!$hardwarePart) {
            return redirect()->back()->with('error', 'Hardware part not found');
        }

        if (!$computer->pc_parts->contains($hardwarePart->Part_ID)) {
            $computer->pc_parts()->attach($hardwarePart->Part_ID);
            return redirect()->route('admin.computer')->with('success', "Hardware part '{$hardwarePart->Part_name}' added to computer '{$computer->PC_Name}'");
        }

        return redirect()->route('admin.computer')->with('info', "Hardware part '{$hardwarePart->Part_name}' is already installed on computer '{$computer->PC_Name}'");
    }

    public function createHardware()
    {
        return view('pc_parts.create');
    }
 
    public function storeHardware(Request $request)
    {
        
        $request->validate([
            'part_type' => 'required|string|max:255',
            'part_name' => 'required|string|max:255',
            'apraksts' => 'required|string|max:255',
        ]);

        $part = PC_Parts::create([
            'Part_type' => $request->input('part_type'),
            'Part_name' => $request->input('part_name'),
            'apraksts' => $request->input('apraksts'),
        ]);

        return redirect()->route('admin.computer')->with('success', 'Hardware created successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\Software;
use App\Models\PC_Parts;
use Illuminate\Support\Facades\DB;
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

    public function destroy($Computer_ID)
{
    $computer = Computer::find($Computer_ID);

    if (!$computer) {
        return redirect()->route('admin.computer')->with('error', 'Computer not found!');
    }

    DB::table('computer_software')->where('Computer_ID', $Computer_ID)->delete();

    $softwareIds = DB::table('computer_software')->where('Computer_ID', $Computer_ID)->pluck('Software_ID');
    Software::whereIn('Software_ID', $softwareIds)->delete();

    DB::table('computer_parts')->where('Computer_ID', $Computer_ID)->delete();

    $hardwareIds = DB::table('computer_parts')->where('Computer_ID', $Computer_ID)->pluck('Part_ID');
    PC_Parts::whereIn('Part_ID', $hardwareIds)->delete();

    $computer->delete();

    return redirect()->route('admin.computer')->with('success', 'Computer has been deleted successfully!');
}

public function destroySoftware($computer_id, $software_id)
{
    // Find the specific computer and software
    $computer = Computer::find($computer_id);
    $software = Software::find($software_id);

    if (!$computer || !$software) {
        return redirect()->route('admin.computer')->with('error', 'Computer or Software not found!');
    }

    // Remove the software from this computer by deleting the pivot table entry
    $computer->softwares()->detach($software_id);

    return redirect()->route('admin.computer', ['computer_id' => $computer_id])
                     ->with('success', 'Software has been removed from the computer successfully!');
}

public function destroyHardware($computer_id, $part_id)
{
    // Find the specific computer and software
    $computer = Computer::find($computer_id);
    $hardware = PC_Parts::find($part_id);

    if (!$computer || !$hardware) {
        return redirect()->route('admin.computer')->with('error', 'Computer or Hardware not found!');
    }

    // Remove the software from this computer by deleting the pivot table entry
    $computer->pc_parts()->detach($part_id);

    return redirect()->route('admin.computer', ['computer_id' => $computer_id])
                     ->with('success', 'Hardware has been removed from the computer successfully!');
}



}

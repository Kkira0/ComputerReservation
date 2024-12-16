<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Software;
use Illuminate\Support\Facades\Auth;

class Computer_Software_Controller
{
    public function showAddExistingSoftwareForm($Computer_ID)
    {
        $softwareList = Software::all();

        $computer = Computer::find($Computer_ID);

        if (!$computer) {
            return redirect()->back()->with('error', 'Computer not found');
        }

        return view('software.add-existing', compact('computer', 'softwareList'));
    }


    public function addExistingSoftwareToComputer(Request $request, $Computer_ID)
    {
        $request->validate([
            'software_id' => 'required|exists:software,Software_ID',  
        ]);

        $computer = Computer::find($Computer_ID);

        if (!$computer) {
            return redirect()->back()->with('error', 'Computer not found');
        }

        $software = Software::find($request->software_id);

        if (!$software) {
            return redirect()->back()->with('error', 'Software not found');
        }

        if (!$computer->softwares->contains($software->Software_ID)) {
            $computer->softwares()->attach($software->Software_ID);
            return redirect()->route('admin.computer')->with('success', "Software '{$software->Software_Name}' added to computer '{$computer->PC_Name}'");
        }

        return redirect()->route('admin.computer')->with('info', "Software '{$software->Software_Name}' is already installed on computer '{$computer->PC_Name}'");
    }

    public function createSoftware()
    {
        return view('software.create');
    }
 
    public function storeSoftware(Request $request)
    {
        
        $request->validate([
            'software_name' => 'required|string|max:255',
            'version' => 'required|string|max:255',
        ]);

        $software = Software::create([
            'Software_Name' => $request->input('software_name'),
            'Version' => $request->input('version'),
        ]);

        return redirect()->route('admin.computer')->with('success', 'Software created successfully.');
    }

    public function addSoftwareToComputer(Request $request, $Computer_ID)
    {
        $request->validate([
            'software_id' => 'required|exists:software,Software_ID',
        ]);

        $computer = Computer::find($Computer_ID);

        if (!$computer) {
            return redirect()->back()->with('error', 'Computer not found');
        }

        $software = Software::find($request->software_id);

        if (!$software) {
            return redirect()->back()->with('error', 'Software not found');
        }

        if (!$computer->softwares->contains($software->Software_ID)) {
            $computer->softwares()->attach($software->Software_ID);
            return redirect()->route('admin.computer')->with('success', "Software '{$software->Software_Name}' added to computer '{$computer->PC_Name}'");
        }

        return redirect()->route('admin.computer')->with('info', "Software '{$software->Software_Name}' is already installed on computer '{$computer->PC_Name}'");
    }

   

}

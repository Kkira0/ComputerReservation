<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;

class ComputerController 
{

//     public function index()
// {
//     $computers = \App\Models\Computer::all(); // Retrieve all computers
//     return view('computer.index', ['computer' => $computers]); // Point to index.blade.php
// }


public function index()
{
    $computers = Computer::with(['softwares', 'pc_parts'])->get();
    



    // Use 'computer.index' instead of 'computers.index'
    return view('computer.index', compact('computers'));
}


}

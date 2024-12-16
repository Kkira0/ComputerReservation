<?php

namespace App\Http\Controllers;
use App\Models\Software;
use App\Models\Computer;
use Illuminate\Http\Request;

class Software_Controller
{
    //
    public function index()
    {
        $softwares = Software::all();
        return view('software.index', compact('softwares'));
    }


    
}

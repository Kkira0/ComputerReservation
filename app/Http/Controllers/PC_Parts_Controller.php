<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PC_Parts;

class PC_Parts_Controller
{
    //
    public function index()
    {
        $pc_partss = PC_Parts::all();
        return view('pc_parts.index', compact('pc_partss'));
    }
}

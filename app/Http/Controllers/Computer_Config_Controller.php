<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer_Config;

class Computer_Config_Controller
{
    
    
    public function index(){
    $computer_configs = \App\Models\Computer_Config::all(); // Retrieve all computers
    return view('computer_config.index', ['computer_configs' => $computer_configs]); // Point to index.blade.php
    }
}



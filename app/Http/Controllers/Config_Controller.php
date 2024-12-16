<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class Config_Controller
{
    public function index()
    {
        $configs = Config::all(); 
        return view('config.index', compact('configs'));
    }

}

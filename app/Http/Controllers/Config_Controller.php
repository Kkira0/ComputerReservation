<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class Config_Controller
{
    

    public function index()
    {
        $configs = Config::all(); // Retrieve all rows from the 'config' table
        return view('config.index', ['config' => $configs]); // Pass the data to the view
    }
}

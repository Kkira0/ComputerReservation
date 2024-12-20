<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    //

    protected $table = "computer";
    protected $fillable = ["PC_Name", "Operating_System", "Rinda", "Colona"];
    protected $primaryKey = "Computer_ID";
    public $timestamps = false;

    public function softwares()
    {
        return $this->belongsToMany(Software::class, 'computer_software', 'Computer_ID', 'Software_ID');
    }

    public function pc_parts()
    {
        return $this->belongsToMany(PC_Parts::class, 'computer_parts', 'Computer_ID', 'Part_ID');
    }

    public function pieteikumi()
    {
        return $this->hasMany(Pieteikums::class, 'Computers', 'Computer_ID'); 
    }

    public function configs()
    {
        return $this->belongsToMany(Config::class, 'computer_config', 'Computer_ID', 'Config_id');
    }

    public function rezervacija()
    {
        return $this->hasMany(Rezervacija::class, 'Computer_ID');
    }
}

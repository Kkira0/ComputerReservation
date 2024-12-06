<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    protected $table = "rezervacija";
    protected $fillable = ["Computer_ID", "Pieteikuma_id", "start_time", "end_time"];
    protected $primaryKey = "Rezervacijas_ID";
    public $timestamps = false;

    public function pieteikums()
    {
        return $this->belongsTo(Pieteikums::class, 'Pieteikuma_ID', 'Pieteikuma_ID');
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'Computer_ID');
    }
    
}
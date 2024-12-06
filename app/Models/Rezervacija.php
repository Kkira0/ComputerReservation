<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    protected $table = "rezervacija";
    protected $fillable = ["Computer_id", "pieteikuma_id", "start_time", "end_time"];
    protected $primaryKey = "Rezervacijas_ID";
    public $timestamps = false;

    public function pieteikums()
    {
        return $this->belongsTo(Pieteikums::class, 'pieteikuma_id', 'pieteikuma_id');
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'Computer_id', 'Computer_ID'); // Consistent with Computer_id in rezervacija
    }
}

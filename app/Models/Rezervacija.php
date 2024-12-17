<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    protected $table = "rezervacija";
    protected $fillable = ["Computer_ID", "pieteikuma_id", "start_time", "end_time", "created_at", "updated_at"];
    protected $primaryKey = "Rezervacijas_ID";
    public $timestamps = true;

    public function pieteikums()
{
    return $this->belongsTo(Pieteikums::class, 'pieteikuma_id', 'pieteikuma_id');
}

public function computer()
{
    return $this->belongsTo(Computer::class, 'Computer_ID', 'Computer_ID');
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieteikums extends Model
{
    protected $table = "pieteikums";
    protected $fillable = ["Computers", "start_time", "end_time", "first_name", "last_name", "phone", "email", "status", "user_id"];
    protected $primaryKey = "pieteikuma_id";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idUsers');
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'Computers', 'Computer_ID');
    }

    public function rezervacija()
    {
        return $this->hasOne(Rezervacija::class, 'pieteikuma_id', 'pieteikuma_id'); // Consistent relationship
    }
}

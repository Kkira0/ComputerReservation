<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = "software";
    protected $fillable = ["Software_Name", "Version"];
    protected $primaryKey = "Software_ID";
    public $timestamps = false;

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'computer_software', 'Software_ID', 'Computer_ID');
    }
}
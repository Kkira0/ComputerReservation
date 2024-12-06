<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer_Parts extends Model
{
    protected $table = "Computer_Parts";
    protected $fillable = ["Computer_ID", "Part_ID"];
    public $timestamps = false;
}

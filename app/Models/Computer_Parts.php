<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer_Parts extends Model
{
    protected $table = "computer_parts";
    protected $fillable = ["Computer_ID", "Part_ID"];
    protected $primaryKey = "Computer_Part_ID";
    public $timestamps = false;
}

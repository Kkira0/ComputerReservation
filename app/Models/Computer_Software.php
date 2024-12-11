<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer_Software extends Model
{
    protected $table = "computer_software";
    protected $fillable = ["Computer_ID", "Software_ID"];
    protected $primaryKey = "Computer_software_ID";
    public $timestamps = false;
}

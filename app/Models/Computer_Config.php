<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer_Config extends Model
{
    protected $table = "computer_config";
    protected $fillable = ["Computer_ID", "Config_id"];
    protected $primaryKey = "Computer_config_ID";
    public $timestamps = false;
}
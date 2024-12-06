<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "config";
    protected $fillable = ["Platform", "userName", "userPassword", "extra_config"];
    protected $primaryKey = "Config_id";
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PC_Parts extends Model
{
    protected $table = "pc_parts";
    protected $fillable = ["Part_type", "Part_name", "apraksts"];
    protected $primaryKey = "Part_ID";
    public $timestamps = false;

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'computer_parts', 'Part_ID', 'Computer_ID');
    }
}
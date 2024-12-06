<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "Roles";
    protected $fillable = ["Role_name"];
    protected $primaryKey = "idRoles";
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(Users::class, 'role_id');
    }
}
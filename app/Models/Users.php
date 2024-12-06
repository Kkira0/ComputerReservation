<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "Users";
    protected $fillable = ["email", "password", "idRoles"];
    protected $primaryKey = "idUsers";

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Roles::class, 'idRoles', 'idRoles'); // Reference the correct foreign and primary key
    }

    public function verifyPlainTextPassword($password)
    {
        return $this->password === $password;  // Compare plain text password
    }
}
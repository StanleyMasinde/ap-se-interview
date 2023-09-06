<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    /**
     * Mass assignable attributes of the admin user.
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}

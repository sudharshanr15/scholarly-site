<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin extends Authenticatable
{
    //
    protected $table = "users_admin";

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

}

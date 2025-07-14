<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    
    protected $table = "departments";

    public function admins(): HasMany{
        return $this->hasMany(UserAdmin::class);
    }

    public function faculties(): HasMany{
        return $this->hasMany(UserFaculty::class);
    }
}

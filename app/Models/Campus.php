<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campus extends Model
{
    use HasFactory;
    
    protected $table = "campus";

    public function schools(): HasMany{
        return $this->hasMany(School::class);
    }
}

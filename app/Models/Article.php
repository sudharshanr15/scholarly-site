<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = "articles";

    public function author(): BelongsTo{
        return $this->belongsTo(UserFaculty::class, "faculty_id");
    }
}

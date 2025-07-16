<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyCitation extends Model
{
    protected $table = "faculty_citation";

    protected $fillable = [
        'faculty_id',
        'g_total_citation',
        'g_h_index',
        'g_i10',
    ];
}

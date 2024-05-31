<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolList extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_type_id',
        'school_name',        
        'school_post_code',
        'school_city',        
        'school_ken',
        'school_address_line_1',
        'school_address_line_2',
    ];
}

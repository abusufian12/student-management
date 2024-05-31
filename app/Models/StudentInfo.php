<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_type_id',
        'school_name_id',        
        'student_name',
        'student_gender',        
        'student_contact_number',
        'student_graduation',
        'student_fb_id',
        'student_country',
        'student_apartment',
        'school_address_line_1',
        'school_address_line_2',
    ];
}

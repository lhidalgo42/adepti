<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id',
        'period',
        'initials',
        'section',
        'subject',
        'status',
        'grade',
        'intranet_id',
        'course_id'
    ];
}

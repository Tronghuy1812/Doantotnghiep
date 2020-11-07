<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'courses_videos';
}

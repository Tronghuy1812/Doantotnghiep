<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected $table = 'courses_contents';
    protected $guarded = [''];

    public function videos()
    {
        return $this->hasMany(CourseVideo::class,'cv_course_content_id');
    }

}

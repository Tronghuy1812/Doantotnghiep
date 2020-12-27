<?php

namespace App\Models\Education;

use App\Models\Favourite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Course extends Model
{
    use HasFactory;

    public $table = 'courses';
    protected $guarded = [''];
    const STATUS_DEFAULT = 1;
    const STATUS_HIDE = 0;
    protected $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Active',
            'class' => 'badge-success'
        ],
        self::STATUS_HIDE => [
            'name' => 'Hide',
            'class' => 'badge-default'
        ]
    ];

    public $level = [
        1 => 'Cơ bản',
        2 => 'Nâng cao',
        3 => 'Chuyên sâu',
        4 => 'Mọi cấp độ',
    ];

    public function getLevel()
    {
        return Arr::get($this->level, $this->c_level,'[N\A]');
    }

    public function getStatus()
    {
        return Arr::get($this->status, $this->t_status, "[N\A]");
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'c_teacher_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'courses_tags','ct_course_id','ct_tag_id');
    }

    public function video()
    {
        return $this->hasMany(CourseVideo::class,'cv_course_id');
    }

    public function favourite()
    {
        return $this->hasMany(Favourite::class,'f_user_id');
    }
}

<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    public $table = 'teachers';
    protected $guarded = [''];

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'teachers_tags','tt_teacher_id','tt_tag_id');
    }
}

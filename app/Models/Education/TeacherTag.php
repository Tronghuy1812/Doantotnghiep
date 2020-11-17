<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTag extends Model
{
    use HasFactory;

    protected $table = 'teachers_tags';
    protected $guarded = [''];
}

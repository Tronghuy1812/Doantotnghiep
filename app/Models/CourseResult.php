<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseResult extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'course_results'; // bảng chi tiết kết quả của người dùng
}

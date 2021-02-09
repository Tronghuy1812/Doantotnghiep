<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseResultDashboard extends Model
{
    use HasFactory;
    protected $table = 'course_results_dashboard' ; // lưu kết quả tổng thể làm trắc nghiệm
    protected $guarded = [''];
}

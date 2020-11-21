<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    const TYPE_COURSE = 1;
    protected $table = 'votes';
    protected $guarded = [''];
}

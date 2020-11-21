<?php

namespace App\Models\Cart;

use App\Models\Education\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_DEFAULT = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCEL = -1;

    protected $guarded = [''];
    protected $table = 'orders';

    public function course()
    {
        return $this->belongsTo(Course::class,'o_action_id');
    }
}

<?php

namespace App\Models\Cart;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'transactions';

    const STATUS_DEFAULT = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCEL = -1;

    protected $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Tiếp nhận',
            'class' => 'badge-default'
        ],
        self::STATUS_PROCESS => [
            'name' => 'Đang xử lý',
            'class' => 'badge-success'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Hoàn thành',
            'class' => 'badge-success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ bỏ',
            'class' => 'badge-dange'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->t_status, "[N\A]");
    }

    public function user()
    {
        return $this->belongsTo(User::class,'t_user_id');
    }
}

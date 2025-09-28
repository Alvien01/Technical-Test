<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tukang_id',
        'start_date',
        'duration_days',
        'status'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tukang() {
        return $this->belongsTo(Tukang::class);
    }

    public function histories() {
        return $this->hasMany(OrderStatusHistory::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id', 'code', 'discount', 'total_price', 'status', 'payment'];
    protected $table = 'orders';
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->code = 'ORD-' . Str::random(3) . '-' . rand(1000, 9999);
        });
    }
}

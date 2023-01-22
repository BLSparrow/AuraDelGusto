<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'comment',
        'reason',
        'amount',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countOrder($order)
    {
        $sumCount = 0;
        foreach ($order->items as $product) {
            $sumCount += $product->count;
        }
        return $sumCount;
    }
}

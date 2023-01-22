<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'number',
        'image',
        'quantity'
    ];

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

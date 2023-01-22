<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'table_id',
        'dateStart',
        'dateEnd',
        'prepayment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function getNewDateStartAttribute()
    {
        return date('d.m.Y H:i', strtotime($this->dateStart));
    }

    public function getNewDateEndAttribute()
    {
        return date('d.m.Y H:i', strtotime($this->dateEnd));
    }
}

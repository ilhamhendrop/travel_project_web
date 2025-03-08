<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'travel_id',
        'name',
        'order',
        'status',
        'payment',
        'total',
        'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function travel() {
        return $this->belongsTo(Travel::class);
    }
}

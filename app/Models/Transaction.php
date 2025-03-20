<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'order_id'];

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id'); // Correct foreign and local key
    }

    protected static function booted()
    {
        static::creating(function ($transaction) {
            $transaction->order_id = 'ORD' . mt_rand(100000, 999999); // Generate unique order_id
        });
    }
}

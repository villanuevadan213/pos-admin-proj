<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = [
        'transaction_id',
        'inventory_item_id',
        'item_code',
        'item_name',
        'quantity',
        'price',
        'total_value',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

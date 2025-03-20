<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'order_id',
        'inventory_item_id',
        'item_code',
        'item_name',
        'quantity',
        'price',
        'total_value',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id'); 
    }

    public function transactionByOrderId()
    {
        return $this->belongsTo(Transaction::class, 'order_id', 'order_id');
    }
    
}

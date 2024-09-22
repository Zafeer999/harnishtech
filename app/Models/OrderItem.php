<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'category_id', 'sub_category_id', 'amount'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

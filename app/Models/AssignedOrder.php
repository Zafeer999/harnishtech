<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedOrder extends Model
{
    use HasFactory;

    protected $fillable = ['service_boy_user_id', 'order_id', 'time_slot_id', 'pincode'];

    public function serviceBoy()
    {
        return $this->belongsTo(User::class, 'service_boy_user_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
}

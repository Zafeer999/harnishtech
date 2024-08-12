<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_PLACED = 0;
    const STATUS_ASSIGNED = 1;
    const STATUS_CONFIRMED = 1;
    const STATUS_PROCESSING = 1;
    const STATUS_COMPLETED = 1;
    const STATUS_CANCELLED = 1;
    const STATUS_REFUNDED = 1;
    const IS_ASSIGNED = 1;
    const IS_UNASSIGNED = 0;
    const PAYMENT_TYPE_PREPAID = 0;
    const PAYMENT_TYPE_POSTPAID = 1;
    const PAYMENT_METHOD_CASH = 0;
    const PAYMENT_METHOD_ONLINE = 1;
    const PAYMENT_STATUS_UNPAID = 0;
    const PAYMENT_STATUS_PAID = 1;
    const PAYMENT_STATUS_FAILED = 2;

    protected $fillable = ['time_slot_id', 'user_id', 'category_id', 'sub_category_id', 'user_address_id', 'coupon_id',
    'order_no', 'amount', 'status', 'is_assigned', 'charges', 'gst_charge', 'total', 'scheduled_on', 'serviced_on',
    'order_note', 'payment_type', 'payment_method', 'payment_status', 'invoice_path'];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id', 'id');
    }
    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}

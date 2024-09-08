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
    const STATUS_CONFIRMED = 2;
    const STATUS_PROCESSING = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_CANCELLED = 5;
    const STATUS_REFUNDED = 6;
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

    // protected $appends = ['order_status_text'];

    public function getOrderStatusTextAttribute()
    {
        return [0 => 'placed', 1 => 'assigned', 2 => 'confirmed', 3 => 'processing', 4 => 'completed', 5 => 'cancelled', 6 => 'refunded'][$this->status];
    }

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

    public static function generateOrderNo()
    {
        $randNumbr = '';
        $i = 1;
        do{
            $orderCount = Order::count()+$i;
            $orderCount = $i > 1 ? ($orderCount+1) : $orderCount;
            preg_match_all('/[A-Z]/', 'HTS', $matches);
            $randNumbr = implode('', $matches[0]).sprintf("%04d", Order::count());
            $i++;
        }
        while(self::where('order_no', $randNumbr)->exists());

        return $randNumbr;
    }

    public function orderImage()
    {
        return $this->hasMany(OrderImage::class);
    }
}

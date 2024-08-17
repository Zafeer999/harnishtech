<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coupon extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount_type',
        'discount_value',
        'min_value',
        'max_value',
        'expiry_date',
        'expiry_count'
    ];

    // Define other model properties and methods as needed

    /**
     * Discount types.
     *
     * @var array
     */
    const DISCOUNT_TYPES = ['flat', 'percent'];

    /**
     * Get the discount types.
     *
     * @return array
     */
    public static function getDiscountTypes()
    {
        return self::DISCOUNT_TYPES;
    }
}

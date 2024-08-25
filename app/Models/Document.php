<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'is_required', 'status'];



    // Define other model properties and methods as needed

    /**
     * Is Required types.
     *
     * @var array
     */
    const IS_REQUIREDS = ['1', '0'];

    /**
     * Get the discount types.
     *
     * @return array
     */
    public static function getIsRequired()
    {
        return self::IS_REQUIREDS;
    }

    /**
     * @var array
     */
    const STATUS = ['1', '0'];

    /**
     * Get the discount types.
     *
     * @return array
     */
    public static function getStatus()
    {
        return self::STATUS;
    }
}

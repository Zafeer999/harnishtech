<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'full_address', 'city', 'pincode', 'is_default'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

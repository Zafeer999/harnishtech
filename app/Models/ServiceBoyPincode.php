<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBoyPincode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_name', 'pincode'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

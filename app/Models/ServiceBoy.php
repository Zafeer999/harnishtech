<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceBoy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'emp_code', 'gender', 'dob', 'doj', 'avg_rating', 'address'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

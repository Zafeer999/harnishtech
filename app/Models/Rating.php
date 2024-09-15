<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_boy_user_id', 'user_id', 'rating', 'heading', 'review'];

    public function serviceBoy()
    {
        return $this->belongsTo(User::class, 'service_boy_user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

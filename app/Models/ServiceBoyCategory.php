<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBoyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_boy_id', 'category_id', 'sub_category_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceBoy()
    {
        return $this->belongsTo(ServiceBoy::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}

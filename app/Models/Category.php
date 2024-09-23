<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'min_price',
        'level',
        'is_featured',
        'category_id',
    ];


    public function subCategories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }
    public function services()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(CategoryRating::class);
    }
}

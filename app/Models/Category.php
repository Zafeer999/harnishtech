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
        'category_id',
    ];


    public function subCategories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

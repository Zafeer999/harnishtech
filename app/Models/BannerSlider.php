<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSlider extends BaseModel
{
    use HasFactory;


    protected $fillable = [
        'image',
        'small_text',
        'main_black_text',
        'main_color_text',
        'text_color',
        'offer_text',
        'button_text',
        'button_color',
        'button_link',
        'status',
    ];
}

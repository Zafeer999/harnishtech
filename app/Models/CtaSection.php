<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtaSection extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'image',
        'small_text',
        'main_text',
        'button_text',
        'button_color',
        'button_link',
        'status',
    ];
}

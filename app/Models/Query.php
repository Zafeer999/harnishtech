<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mobile', 'message'];
}

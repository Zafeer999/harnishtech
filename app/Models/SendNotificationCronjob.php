<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendNotificationCronjob extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'target', 'content', 'method', 'is_send'];
}

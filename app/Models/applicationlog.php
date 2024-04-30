<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicationlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'applogid',
        'message',
        'exception'
    ];
}

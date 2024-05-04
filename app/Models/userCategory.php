<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usercategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryId',
        'userId'
    ];
}

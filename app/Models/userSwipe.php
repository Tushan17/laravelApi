<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userswipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'userswipes',
        'onuser',
        'swipesId'
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class swipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'swipeDirection'
    ];

    public function userswipes()
    {
        return $this->hasMany(userswipe::class);
    }
}

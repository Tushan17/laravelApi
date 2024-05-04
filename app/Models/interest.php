<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest_Name'
    ];

    public function userinterests()
    {
        return $this->hasMany(userinterest::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'user1',
        'user2'
    ];

    public function chats()
    {
        return $this->hasMany(chat::class);
    }
}

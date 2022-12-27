<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
    ];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

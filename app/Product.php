<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'price', 'desc'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}

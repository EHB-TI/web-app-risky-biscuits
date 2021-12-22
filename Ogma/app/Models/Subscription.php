<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'post',
        'subscriber',
        'email'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'subscriber');
    }
}

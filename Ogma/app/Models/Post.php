<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'message',
        'dateOfPublication',
        'topic',
        'author'
    ];

    public function Author(){
        return $this->belongsTo(User::class, 'author');
    }

    public function topic(){
        return $this->belongsTo(topic::class, 'topic');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post');
    }

    public function tasks(){
        return $this->hasOne(Task::class, 'post');
    }
}

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
        'category',
        'author'
    ];

    public function Author(){
        return $this->belongsTo(User::class, 'author');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post');
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes');
    }
}

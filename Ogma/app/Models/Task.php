<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'post',
        'question',
        'answer1',
        'answer2',
        'answer3'
    ];

    public function Post(){
        return $this->belongsTo(User::class, 'post');
    }
}

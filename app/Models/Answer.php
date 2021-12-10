<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = "answers";
    protected $fillable = [
        'id',
        'content',
        'question_id'
    ];
    public $timestamps = false;

    public function post(){
        return Post::find($this->id);
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}

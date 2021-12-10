<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $fillable = [
        'id',
        'title',
        'body'
    ];
    public $timestamps = false;
    
    public function tag(){
        return $this->belongsToMany(Tag::class, 'question_tag', 'question_id', 'tag_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'id');
    }

    public function answer(){
        return $this->hasMany(Answer::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id');
    }


}

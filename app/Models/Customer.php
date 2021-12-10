<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = [
        "id",
        "display_name",
        "location",
        'title',
        'image',
        'about_me',
        'website_link',
        'github_link'
    ];
    public $timestamps = false;

    public function user(){
        return User::find($this->id);
        return $this->belongsTo(User::class, 'id');
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function questions(){
        return $this->hasManyThrough(
            Question::class, 
            Post::class, 
            'customer_id',
            'id',
            'id',
            'id'
        );
    }

    public function countPost(){
        return $this->withCount('post')->get();
    } 

    public function savedQuestions(){
        return $this->belongsToMany(Question::class, 'saved_list', 'customer_id', 'question_id');
    }
}

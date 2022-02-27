<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'customer_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    } 

    public function totalVote(){
        return Vote::where('post_id', $this->id)->sum('value');
    }

    public function question(){
        $answer = Answer::find($this->id);
        if(is_null($answer)){
            return $this;
        }else{
            $question = $answer->question()->first();
            $post = $question->post()->first();
            return $post;
        }
    }
}

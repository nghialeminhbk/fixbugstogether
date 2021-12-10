<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = [
        'comment',
        'post_id',
        'customer_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function question(){
        return $this->belongsTo(Question::class, 'post_id');
    }
}

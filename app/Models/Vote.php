<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = "votes";
    public $timestamps = false;
    protected $fillable = [
        'post_id',
        'customer_id',
        'value'
    ];
}

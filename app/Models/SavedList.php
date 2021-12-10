<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedList extends Model
{
    use HasFactory;
    protected $table = 'saved_list';
    protected $fillable = [
        'customer_id',
        'question_id'
    ];
    public $timestamps = false;
}

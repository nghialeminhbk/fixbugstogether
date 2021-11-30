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
}

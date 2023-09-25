<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment () {
        return $this->hasMany(Comment::class);
    }

    public function category () {
        return $this->hasOne(Category::class);
    }
}

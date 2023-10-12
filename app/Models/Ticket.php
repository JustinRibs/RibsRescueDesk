<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'category',
        'assigned_to',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment () {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters) {

        if($filters['category'] ?? null) {
            $query->where('category', 'like', '%' . request('category') . '%');
        }
        if($filters['id'] ?? null) {
            $query->where('user_id', 'like'. '%' . request('id') . '%');
        }
    }

    public function assignedTo () {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

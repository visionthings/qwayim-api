<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'place_id',
        'comment_id',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function place(){
        return $this->belongsTo(Place::class,'place_id','id');
    }
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id','id');
    }
    public function favorites(){
        return $this->hasMany(Favorite::class,'user_id','id');
    }
}

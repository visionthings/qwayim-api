<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'place_id',
        'question',
    ];



    // start relationship
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
        public function place(){
            return $this->belongsTo(Place::class,'place_id','id');
        }
        public function answers(){
            return $this->hasMany(Answer::class,'question_id','id');
        }
    // end relationship
    
}

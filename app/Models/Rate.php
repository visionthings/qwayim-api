<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'user_id',
        'profile_pic',
        'username',
        'rate',
    ];


    // start relationship
        public function place(){
            return $this->belongsTo(Place::class,'place_id','id');
        }
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
    // end relationship

}

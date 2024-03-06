<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'phone',
        'email',
        'website',
        'facebook',
        'instagram',
        'snapchat',
    ];


    // start relationships
        public function place(){
            return $this->belongsTo(Place::class,'place_id','id');
        }
    // end relationships

}

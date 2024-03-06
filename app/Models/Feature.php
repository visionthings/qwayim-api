<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'features',

    ];

        // start relationships
            public function place(){
                return $this->belongsTo(Place::class,'place_id','id');
            }
        // end relationships

    protected $casts=[
        'features'=>'array',

    ];

}

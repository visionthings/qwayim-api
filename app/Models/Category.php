<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];


    // start relationships
    public function places(){
        return $this->hasMany(Place::class,'category_id','id');
    }
    public function catfilters(){
        return $this->hasMany(Catfilter::class,'category_id','id');
    }
    // end relationships



}

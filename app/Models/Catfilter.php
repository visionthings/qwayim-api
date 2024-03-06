<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catfilter extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
    ];

    // start realtionships
     public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
     }
    // end realtionships
    
}

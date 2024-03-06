<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_id',
        'user_id',
        'content'
    ];

    // start reltionship

    public function place(){
        return $this->belongsTo(Place::class,'place_id','id')
                ->withDefault();
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id')
                ->withDefault();
    }
    // end relationship

    // start scope
    public function scopeFilter(Builder $builder,$filter){
        $filterOptions = array_merge([
            'place_id' => null,
        ], $filter);

        $builder->when($filterOptions['place_id'], function (Builder $builder, $value) {
            $builder->where('place_id',$value);
        });
    }
    // end scope


}

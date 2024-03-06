<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'status',
    ];

    // start reltionship
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
    // end relationship
    
        // start scope
        public function scopeFilter(Builder $builder,$filter){
            $filterOptions = array_merge([
                'user_id'=>null,
            ], $filter);
            if($filterOptions['user_id']==='not_subscriper'){
                $builder->when($filterOptions['user_id'], function (Builder $builder, $value) {
                    $builder->where('user_id',null);
                });
            }
            if($filterOptions['user_id']==='subscriper'){
                $builder->when($filterOptions['user_id'], function (Builder $builder, $value) {
                    $builder->where('user_id','<>',null);
                });
            }
        }
    //end scope
}

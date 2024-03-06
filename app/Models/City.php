<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class City extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'name',
        'slug',
        'country_code',
        'about',
        'google_map',
        'search_count',
        'status',
        'reach_by_plane',
        'reach_by_train',
        'reach_by_car',
        'reach_by_public_transport',
    ];

    // start relationships
        public function places() :HasMany{
            return $this->hasMany(Place::class,'city_id','id');
        }

        public function news () :HasMany
        {
            return $this->hasMany(News::class,'city_id','id');
        }

    // end relationships
        // start scope
        // public function scopeFilter(Builder $builder,$filter,$city_id){
        //     $filterOptions = array_merge([
        //         'city_id'=>null,
        //     ], $filter);

        //     $builder->when($filterOptions['city_id'], function (Builder $builder, $value) {
        //         $builder->where('id',$value);
        //     });

        //     if($filterOptions['city_id'] = null){
        //         $builder->where('id',$city_id);
        //     }
        // }
    // end scope

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('city');
        $this->addMediaCollection('flag');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Place extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'city_id',
        'category_id',
        'name',
        'google_map',
        'address',
        'description',
        'nearest_airport',
        'distance',
        'search_count',
        'view',
        'status',
        'reach_by_plane',
        'reach_by_train',
        'reach_by_car',
        'reach_by_public_transport',
    ];



    // start relationships
        public function category(){
            return $this->belongsTo(Category::class,'category_id','id')->withDefault();
        }
        public function city(){
            return $this->belongsTo(City::class,'city_id','id')->withDefault();
        }
        public function feature(){
            return $this->hasOne(Feature::class,'place_id','id');
        }
        public function contact(){
            return $this->hasOne(Contact::class,'place_id','id');
        }
        public function comments(){
            return $this->hasMany(Comment::class,'place_id','id');
        }
        public function questions(){
            return $this->hasMany(Question::class,'place_id','id');
        }
        public function suggestions(){
            return $this->hasMany(Suggestion::class,'place_id','id');
        }
        public function rates(){
            return $this->hasMany(Rate::class,'place_id','id');
        }
    // end relationships

    // start scope
        public function scopeFilter(Builder $builder,$filter,$city_id){
            $filterOptions = array_merge([
                'place_id'=>null,
                'category_id' => null,
                'city_id'=>null,
            ], $filter);

            $builder->when($filterOptions['place_id'], function (Builder $builder, $value) {
                $builder->where('id',$value);
            });
            $builder->when($filterOptions['category_id'], function (Builder $builder, $value) {
                $builder->where('category_id',$value);
            });
            $builder->when($filterOptions['city_id'], function (Builder $builder, $value) {
                $builder->where('city_id',$value);
            });
            if($filterOptions['city_id'] == null){
                $builder->where('city_id',$city_id);
            }

        }
        public function scopeCommentFilter(Builder $builder,$filter){
            $filterOptions = array_merge([
                'place_id'=>null,
                'category_id' => null,
                'city_id'=>null,
            ], $filter);

            $builder->when($filterOptions['place_id'], function (Builder $builder, $value) {
                $builder->where('id',$value);
            });
            $builder->when($filterOptions['category_id'], function (Builder $builder, $value) {
                $builder->where('category_id',$value);
            });
            $builder->when($filterOptions['city_id'], function (Builder $builder, $value) {
                $builder->where('city_id',$value);
            });


        }

    // end scope

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('place');
    }
}

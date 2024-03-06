<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'city_id',
        'title',
        'description',
     ];

    public function city():BelongsTo {
        return $this->belongsTo(City::class,'city_id','id')->withDefault();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('news');
     }
}

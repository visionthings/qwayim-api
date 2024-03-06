<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia,HasRoles;
    protected $fillable = [
        'name',
        'password',
        'email',
        'phone',
        'job_name',
        'job_descripation',
        'setting_change_not',
        'subscriper_message_not',
        'subscriper_comment_not',
        'subscriper_rate_not',
        'subscriper_question_not'
    ];

    public function favorites(){
        return $this->hasMany(Favorite::class,'admin_id','id');
    }
 
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('admin');
    }

}

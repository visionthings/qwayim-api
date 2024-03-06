<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;



class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_code',
        'city',
        'gender',
        'date_of_birth',
        'online',
        'status',
    ];
    

    // start relationship
        public function messages(){
            return $this->hasMany(Message::class,'user_id','id');
        }
        public function comments(){
            return $this->hasMany(Comment::class,'user_id','id');
        }
        public function questions(){
            return $this->hasMany(Question::class,'user_id','id');
        }
        public function answers(){
            return $this->hasMany(Answer::class,'user_id','id');
        }
    //end relationship

    // start scope
        public function scopeFilter(Builder $builder,$filter){
            $filterOptions = array_merge([
                'status'=>null,
            ], $filter);
            
            $builder->when($filterOptions['status'], function (Builder $builder, $value) {
                $builder->where('status',$value);
            });
        }
    //end scope
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth'=>'datetime',
        'password' => 'hashed',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_pic',
        'username',
        'question_id',
        'answer',
    ];



    // start relationship
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
        public function question(){
            return $this->belongsTo(Question::class,'question_id','id');
        }
    // end relationship

}

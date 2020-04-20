<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $guarded = ['id'];
    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
    public static function boot(){
        parent::boot();

        static::deleted(function ($topic) {
            foreach($topic->lessons as $lesson) {
                $lesson->delete();
            }
        });
    }
}

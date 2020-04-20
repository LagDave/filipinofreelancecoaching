<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $guarded = ['id'];
    public function topics(){
        return $this->hasMany('App\Topic');
    }
    public static function boot(){
        parent::boot();

        static::deleted(function ($course) {
            foreach($course->topics as $topic) {
                $topic->delete();
            }
        });
    }
}

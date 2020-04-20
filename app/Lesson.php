<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $guarded = ['id'];
    public function topic(){
        return $this->belongsTo('App\Topic');
    }
}

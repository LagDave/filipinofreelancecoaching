<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $guarded = ['id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}

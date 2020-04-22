<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    public $fillable = ['url', 'user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}

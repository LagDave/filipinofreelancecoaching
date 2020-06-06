<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public $guarded = ['id'];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');

    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklySale extends Model
{
    public $table = 'weekly_sales';
    public $guarded = ['id'];
}

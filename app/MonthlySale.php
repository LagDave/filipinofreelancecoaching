<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySale extends Model
{
    public $table = 'monthly_sales';
    public $guarded = ['id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Date extends Model
{
    protected $table = 'dates';
   
    protected $hidden = [
        'id',
        'date'
    ];

    protected $appends = [
        'month',
        'day'
    ];

    public $timestamps = false;

    public function getMonthAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format('M');
    }

    public function getDayAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format('d');
    }
}

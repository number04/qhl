<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Time extends Model
{
    protected $table = 'times';

    protected $hidden = [
        'id',
        'time'
    ];

    protected $appends = [
        'clock'
    ];

    public $timestamps = false;

    public function getClockAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->time)->format('g:i A');
    }
}

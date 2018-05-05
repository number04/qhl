<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $hidden = [
        'date_id',
        'time_id'
    ];

    protected $appends = [];

    public $timestamps = false;

    public function date()
    {
        return $this->belongsTo(Date::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function home()
    {
        return $this->belongsTo(Franchise::class, 'home', 'id');
    }

    public function visitor()
    {
        return $this->belongsTo(Franchise::class, 'visitor', 'id');
    }

    public function bye()
    {
        return $this->belongsTo(Bye::class);
    } 
}

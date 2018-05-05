<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $hidden = [];

    protected $appends = [
        'points',
        'goals_against_average'
    ];

    public $timestamps = false;
    

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function getPointsAttribute()
    {
        return $this->goals + $this->assists;
    }

    public function getGoalsAgainstAverageAttribute()
    {
        if ($this->time_on_ice === 0) {
            return '0.00';
        }

        return number_format(($this->goals_against / ($this->time_on_ice / 54)),2);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $table = 'standings';

    protected $hidden = [
        'franchise_id'
    ];

    protected $appends = [
        'points'
    ];

    public $timestamps = false;
    
    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function getPointsAttribute()
    {
        return ($this->wins * 2) + $this->overtime_loses;
    }
}

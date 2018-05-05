<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bye extends Model
{
    protected $table = 'byes';

    public $timestamps = false;

    protected $hidden = [
        'id',
        'franchise_id',
        'date_id'
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function date()
    {
        return $this->belongsTo(Date::class);
    }
}

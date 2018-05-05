<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchises';

    public $timestamps = false;

    public function player()
    {
        return $this->hasMany(Player::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function bye()
    {
        return $this->hasMany(Bye::class);
    }

    public function standing()
    {
        return $this->hasOne(Standing::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $hidden = [];
   
    protected $appends = [
        'full_name'
    ];

    public $timestamps = false;


    public function player()
    {
        return $this->hasOne(Player::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

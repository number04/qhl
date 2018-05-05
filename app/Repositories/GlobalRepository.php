<?php

namespace App\Repositories;

use DB;

/**
 *
 */

class GlobalRepository
{
    // get date id

    public function date()
    {
        return DB::table('globals')
            ->where('name', '=', 'date_id')
            ->first()
            ->value;
    }
}
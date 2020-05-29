<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Routines;

class Note extends Model
{
    protected $fillable = [
        'time_show',
        'message',
        'hash',
        'ip'
    ];

    /**
     * Deletes activated notes older than a week
     */
    public static function deleteOld()
    {
        Note::where('time_show', '<', Routines::createDateMinusWeek())->delete();
    }
}


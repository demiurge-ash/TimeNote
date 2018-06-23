<?php

namespace TimeNote;

use Illuminate\Database\Eloquent\Model;
use TimeNote\Helpers\Routines;

class Note extends Model
{
    /**
     * Deletes activated notes older than a week
     */
    public static function deleteOld()
    {
        Note::where('time_show', '<', Routines::createDateMinusWeek())->delete();
    }
}


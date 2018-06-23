<?php

namespace TimeNote\Helpers;

use TimeNote\Note;

class Routines
{
    const USA_DATE_FORMAT = 'Y-m-d H:i:s';
    const RU_DATE_FORMAT = 'd/m/Y H:i:s';

    public static $isDate;

    /**
     * @param $hash
     * @return bool
     */
    public static function getNoteByHash($hash)
    {
        $boxnote = Note::where('hash', $hash)->first();
        return (isset($boxnote)) ? $boxnote : false;
    }

    /**
     * @param $text
     * @return string
     */
    public static function makeHash($text)
    {
        return hash('md5', time() .$text);
    }

    /**
     * @param $date
     * @return false|string
     */
    public static function formatDate($date)
    {
        $date = date_create($date);
        return date_format($date, Routines::RU_DATE_FORMAT);
    }

    public static function createDateMinusWeek()
    {
        $date = date_create(date(Routines::USA_DATE_FORMAT, strtotime('-1 week')));
        return date_format($date, Routines::USA_DATE_FORMAT);
    }

    /**
     * @param $format
     * @return false|string
     */
    public static function createDatePlusHour($format)
    {
        if (!Routines::$isDate) {
            Routines::$isDate = date_create(date(Routines::USA_DATE_FORMAT, strtotime('+1 hour')));
        }
        return date_format(Routines::$isDate, $format);
    }
}
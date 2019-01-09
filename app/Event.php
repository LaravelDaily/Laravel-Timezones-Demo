<?php

namespace App;

use Camroncade\Timezone\Facades\Timezone;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Event
 *
 * @package App
 * @property string $title
 * @property string $start_time
 */
class Event extends Model
{
    protected $fillable = ['title', 'start_time'];
    protected $hidden = [];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartTimeAttribute($input)
    {
        if ($input != null && $input != '') {
//            dd(Timezone::convertToUTC($input, 'Europe/London', config('app.date_format') . ' H:i:s'));
            $this->attributes['start_time'] =
                Timezone::convertToUTC($input, auth()->user()->timezone, config('app.date_format') . ' H:i:s');
        } else {
            $this->attributes['start_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartTimeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
//            dd($input);
//            dd(auth()->user()->timezone);
//            dd(Timezone::convertFromUTC($input, 'Europe/London', config('app.date_format') . ' H:i:s'));
            return Timezone::convertFromUTC($input, auth()->user()->timezone, config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

}

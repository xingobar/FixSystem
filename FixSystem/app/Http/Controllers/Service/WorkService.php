<?php

namespace App\Http\Controllers\Service;

use Carbon\Carbon;
use Log;

class WorkService
{

    public static function isGreaterThanZero($start,$end){
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        return $end->gte($start);
    }

    public static function calculateWorkHour($start,$end){
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        $minutes = $start->diffInMinutes($end);
        $hours = $minutes / 60 ;
        $minutes = round($minutes % 60,1);
        $time = floatval($hours . '.' . $minutes);
        $time = round($time,2);
        //$time = number_format((float)$time, 2, '.', '');
                
        return round($time,2);
    }

    public static function getLastDayHour($start,$end,$time){
        
        $dates = [];
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        for($date = $start ; $date->lte($end) ; $date->addDay()){

            Log::info($date . ' =>  ' . $date->dayOfWeek);
            if($date->dayOfWeek === 0 || $date->dayOfWeek === 6){
                array_push($dates,$date);
                $time -= 24;
                $now = Carbon::create($date->year,$date->month,$date->day,0,0,0);
                $diff = self::calculateWorkHour($now,$date);
                Log::info( ' date  => ' .  $date . ' diff  => ' . $diff);
                $time += $diff;
            }
        }
        $time = ($time < 0) ? 0 : $time;
        return $time;
    }
}
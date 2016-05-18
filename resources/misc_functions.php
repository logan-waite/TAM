<?php
setlocale(LC_MONETARY, 'en_US');

    function debug($item)
    {
        echo "<pre>";
        var_dump($item);
        echo "</pre>";
    }

    function time_to_decimal($time) 
    {
        $timeArr = explode(':', $time);
        if ($timeArr[2] >= 30)
        {
            $timeArr[1]++;
        }
        $decTime = ($timeArr[0]) + ($timeArr[1]/60);
 
        return $decTime;
    }

    function decimal_to_time($decimal) 
    {
        $hours = floor($decimal / 60);
        $minutes = floor($decimal % 60);
        $seconds = $decimal - (int)$decimal;
        $seconds = round($seconds * 60);

        return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
    }
?>
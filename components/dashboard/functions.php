<?php
    function timeAgo($date) {
        $timestamp = $date;
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");
        $currentTime = time();

        if ($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }
            $diff = round($diff);
            return "" . $diff . " " . $strTime[$i] . "s ago";
        }
    }
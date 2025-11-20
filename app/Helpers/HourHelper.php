<?php

namespace App\Helpers;

class HourHelper
{
    public static function fullDayRange(string $start = '06:00', string $end = '05:30', int $stepMinutes = 30): array
    {
        $hours = [];

        $startTime = \DateTime::createFromFormat('H:i', $start);
        $endTime   = \DateTime::createFromFormat('H:i', $end)->modify('+1 day');

        while ($startTime <= $endTime) {
            $formatted = $startTime->format('H:i');
            $hours[$formatted] = $formatted;
            $startTime->modify("+{$stepMinutes} minutes");
        }

        return $hours;
    }
}

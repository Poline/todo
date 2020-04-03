<?php

namespace Todo\Todo\Common;

use Carbon\Carbon;

abstract class DTO
{
    /**
     * Convert to date string
     *
     * @param $dateString
     * @return string
     */
    protected function toDateString($dateString): ?string
    {
        if (is_null($dateString)) {
            return null;
        }
        return Carbon::parse($dateString)->toDateString();
    }
}

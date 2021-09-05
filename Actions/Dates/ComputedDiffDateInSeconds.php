<?php

namespace Modules\BaseCore\Actions\Dates;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class ComputedDiffDateInSeconds
{
    /**
     * @param string $start
     * @param string $end
     * @return array{start:Carbon,duration:int,end:Carbon|null}
     */
    public function getDates(string $start, string $end):array
    {
        $start = (new DateStringToCarbon())->handle($start);
        try {
            $end = (new DateStringToCarbon())->handle($end);
            $duration = (int) $start->diffInSeconds($end);
        }
        catch(InvalidFormatException $e)
        {
            $end = null;
            $duration = 0;
        }

        return [
          "start" => $start,
          "end" => $end,
          'duration' => $duration
        ];
    }

}

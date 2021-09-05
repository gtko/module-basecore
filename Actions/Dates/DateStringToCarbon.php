<?php

namespace Modules\BaseCore\Actions\Dates;


use Carbon\Carbon;

class DateStringToCarbon
{
    public function handle($dateString)
    {
       return Carbon::parse($dateString, 'UTC');
    }
}

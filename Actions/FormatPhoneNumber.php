<?php

namespace Modules\BaseCore\Actions;

use Illuminate\Support\Str;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class FormatPhoneNumber
{
    public function format($phone, $locale = 'FR'){
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        try {
            if (Str::contains($phone, '+')) {
                $phoneParsed = $phoneNumberUtil->parse($phone, null);
            } else {
                $phoneParsed = $phoneNumberUtil->parse($phone, $locale);
            }

            if ($phoneNumberUtil->isValidNumber($phoneParsed)) {
                return $phoneNumberUtil->format($phoneParsed, PhoneNumberFormat::E164);
            }
        }
        catch(\Exception $e){

        }

        return $phone;
    }

}

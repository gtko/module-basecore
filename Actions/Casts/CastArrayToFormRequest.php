<?php

namespace Modules\BaseCore\Actions\Casts;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CrmBe\Http\Requests\ClientStoreRequest;

class CastArrayToFormRequest {

    public function cast(array $data, string $formRequest):FormRequest
    {
        $request = app($formRequest)->replace($data);
        $request->validateResolved();

        return $request;
    }

}

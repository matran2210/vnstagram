<?php

namespace App\Http;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

use App\Exceptions as VnException;

abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
    	throw new VnException\GeneralException("ECE004", null, null, [$validator->errors()->first()]);
    }

    protected function failedAuthorization()
    {
        throw new HttpException(403);
    }
}

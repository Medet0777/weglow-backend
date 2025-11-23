<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
{

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'otp' => 'required|digits:4',
        ];
    }
}

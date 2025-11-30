<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'email' => ['email'],
            'nickname' => ['string'],
            'city' => ['string'],
        ];
    }
}

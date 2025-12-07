<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'symbol' => 'required|string|unique:stocks,symbol,' . $this->id,
            'name' => 'required|string',
            'current_price' => 'required|numeric|min:0',
            'prev_close_price' => 'nullable|numeric|min:0',
            'open_price' => 'nullable|numeric|min:0',
            'high_price' => 'nullable|numeric|min:0',
            'low_price' => 'nullable|numeric|min:0',
            'volume' => 'nullable|integer|min:0',
            'logo_url' => 'nullable|url',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}

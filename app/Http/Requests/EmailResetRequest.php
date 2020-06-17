<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailResetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }
}

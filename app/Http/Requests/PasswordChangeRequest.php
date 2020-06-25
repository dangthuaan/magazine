<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordMatch;
use App\Rules\CurrentPasswordSame;
use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', 'string', new CurrentPasswordMatch],
            'new_password' => ['required', 'string', 'min:6', 'confirmed', new CurrentPasswordSame],
        ];
    }
}

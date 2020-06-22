<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cover' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
        ];
    }
}

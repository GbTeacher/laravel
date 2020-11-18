<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sources' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return array_merge(parent::messages(), [
            'sources.required' => 'Необходимо выбрать минимум один источник',
        ]);
    }
}

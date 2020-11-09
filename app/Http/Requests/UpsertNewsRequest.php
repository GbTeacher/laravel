<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpsertNewsRequest extends FormRequest
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
            'title'       => 'required|string',
            'category_id' => sprintf('required|exists:%s,id', (new Category())->getTable()),
            'photo'       => 'nullable|url',
            'short_text'  => 'required|string',
            'full_text'   => 'required|string',
        ];
    }
}

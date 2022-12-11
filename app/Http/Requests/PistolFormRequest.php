<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PistolFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['required'],
            'number' => ['required'],
        ];
    }

    public function messages()
{
    return [
        'type.required' => 'لم يتم ادخال نوع الطبنجة',
        'number.required' => 'لم يتم ادخال رقم الطبنجة',
    ];
}
}

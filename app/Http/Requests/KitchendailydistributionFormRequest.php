<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KitchendailydistributionFormRequest extends FormRequest
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


    public function rules()
    {
        return [
            'date' => ['required'],
            'officers_number' => ['required'],
            'amens_number' => ['required'],
            'soliders_number' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'حقل التاريخ مطلوب',
            'officers_number.required' => 'حقل عدد الضباط مطلوب',
            'amens_number.required' => 'حقل عدد الافراد مطلوب',
            'soliders_number.required' => 'حقل عدد المجندين مطلوب',
        ];
    }
}

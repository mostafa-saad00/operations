<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficerFormRequest extends FormRequest
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
            'gehat' => 'required|max:255',
            'pistol' => 'required|max:255',
            'rank' => 'required|max:255',
            'name' => 'required|max:255',
            'nick_name' => 'required|max:255',
            'tarteb' => 'required|numeric',
            'year_of_graduate' => 'required|numeric',
            'what_he_do' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'religion' => 'required|max:255',
            'status' => 'required|max:255',
            'phone1' => 'required|numeric',
            'health' => 'required|max:255',
        ];
    }

    public function messages()
{
    return [
        'gehat.required' => 'تأكد من اختيار الجهة',
        'pistol.required' => 'تأكد من اختيار الطبنجة',
        'rank.required' => 'تأكد من اختيار الرتبة',
        'name.required' => 'تأكد من ادخال الاسم بطريقة صحيحة',
        'nick_name.required' => 'تأكد من ادخال اسم الشهرة بطريقة صحيحة',
        'tarteb.required' => 'تأكد من ادخال الترتيب بطريقة صحيحة',
        'year_of_graduate.required' => 'تأكد من ادخال سنة التخرج بطريقة صحيحة',
        'what_he_do.required' => 'تأكد من ادخال العمل القائم به بطريقة صحيحة',
        'address.required' => 'تأكد من ادخال العنوان بطريقة صحيحة',
        'city.required' => 'تأكد من اختيار المحافظة',
        'religion.required' => 'تأكد من اختيار الديانة',
        'status.required' => 'تأكد من اختيار الحالة الاجتماعية',
        'phone1.required' => 'تأكد من ادخال رقم التليفون 1 بطريقة صحيحة',
        'health.required' => 'تأكد من ادخال الحالة الصحية بطريقة صحيحة',
    ];
}

}

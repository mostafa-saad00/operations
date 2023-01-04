<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class KitchenitemFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => ['required'],
            'unit' => ['required'],
            'current_quantity' => ['required'],

            'saturday_winter_officer' => ['required'],
            'saturday_summer_officer' => ['required'],
            'saturday_winter_solider' => ['required'],
            'saturday_summer_solider' => ['required'],
            'saturday_winter_amen' => ['required'],
            'saturday_summer_amen' => ['required'],

            'sunday_winter_officer' => ['required'],
            'sunday_summer_officer' => ['required'],
            'sunday_winter_solider' => ['required'],
            'sunday_summer_solider' => ['required'],
            'sunday_winter_amen' => ['required'],
            'sunday_summer_amen' => ['required'],

            'monday_winter_officer' => ['required'],
            'monday_summer_officer' => ['required'],
            'monday_winter_solider' => ['required'],
            'monday_summer_solider' => ['required'],
            'monday_winter_amen' => ['required'],
            'monday_summer_amen' => ['required'],

            'tuesday_winter_officer' => ['required'],
            'tuesday_summer_officer' => ['required'],
            'tuesday_winter_solider' => ['required'],
            'tuesday_summer_solider' => ['required'],
            'tuesday_winter_amen' => ['required'],
            'tuesday_summer_amen' => ['required'],

            'wednesday_winter_officer' => ['required'],
            'wednesday_summer_officer' => ['required'],
            'wednesday_winter_solider' => ['required'],
            'wednesday_summer_solider' => ['required'],
            'wednesday_winter_amen' => ['required'],
            'wednesday_summer_amen' => ['required'],

            'thursday_winter_officer' => ['required'],
            'thursday_summer_officer' => ['required'],
            'thursday_winter_solider' => ['required'],
            'thursday_summer_solider' => ['required'],
            'thursday_winter_amen' => ['required'],
            'thursday_summer_amen' => ['required'],

            'friday_winter_officer' => ['required'],
            'friday_summer_officer' => ['required'],
            'friday_winter_solider' => ['required'],
            'friday_summer_solider' => ['required'],
            'friday_winter_amen' => ['required'],
            'friday_summer_amen' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'                     => 'حقل اسم الصنف مطلوب',
            'unit.required'                     => 'حقل وحدة القياس مطلوب',
            'current_quantity.required'         => 'حقل الكمية الحالية مطلوب',

            'saturday_winter_officer.required'  => 'حقل كذا مطلوب',
            'saturday_summer_officer.required'  => 'حقل كذا مطلوب',
            'saturday_winter_solider.required'  => 'حقل كذا مطلوب',
            'saturday_summer_solider.required'  => 'حقل كذا مطلوب',
            'saturday_winter_amen.required'     => 'حقل كذا مطلوب',
            'saturday_summer_amen.required'     => 'حقل كذا مطلوب',

            'sunday_winter_officer.required'    => 'حقل كذا مطلوب',
            'sunday_summer_officer.required'    => 'حقل كذا مطلوب',
            'sunday_winter_solider.required'    => 'حقل كذا مطلوب',
            'sunday_summer_solider.required'    => 'حقل كذا مطلوب',
            'sunday_winter_amen.required'       => 'حقل كذا مطلوب',
            'sunday_summer_amen.required'       => 'حقل كذا مطلوب',

            'monday_winter_officer.required'    => 'حقل كذا مطلوب',
            'monday_summer_officer.required'    => 'حقل كذا مطلوب',
            'monday_winter_solider.required'    => 'حقل كذا مطلوب',
            'monday_summer_solider.required'    => 'حقل كذا مطلوب',
            'monday_winter_amen.required'       => 'حقل كذا مطلوب',
            'monday_summer_amen.required'       => 'حقل كذا مطلوب',

            'tuesday_winter_officer.required'   => 'حقل كذا مطلوب',
            'tuesday_summer_officer.required'   => 'حقل كذا مطلوب',
            'tuesday_winter_solider.required'   => 'حقل كذا مطلوب',
            'tuesday_summer_solider.required'   => 'حقل كذا مطلوب',
            'tuesday_winter_amen.required'      => 'حقل كذا مطلوب',
            'tuesday_summer_amen.required'      => 'حقل كذا مطلوب',

            'wednesday_winter_officer.required' => 'حقل كذا مطلوب',
            'wednesday_summer_officer.required' => 'حقل كذا مطلوب',
            'wednesday_winter_solider.required' => 'حقل كذا مطلوب',
            'wednesday_summer_solider.required' => 'حقل كذا مطلوب',
            'wednesday_winter_amen.required'    => 'حقل كذا مطلوب',
            'wednesday_summer_amen.required'    => 'حقل كذا مطلوب',

            'thursday_winter_officer.required'  => 'حقل كذا مطلوب',
            'thursday_summer_officer.required'  => 'حقل كذا مطلوب',
            'thursday_winter_solider.required'  => 'حقل كذا مطلوب',
            'thursday_summer_solider.required'  => 'حقل كذا مطلوب',
            'thursday_winter_amen.required'     => 'حقل كذا مطلوب',
            'thursday_summer_amen.required'     => 'حقل كذا مطلوب',

            'friday_winter_officer.required'    => 'حقل كذا مطلوب',
            'friday_summer_officer.required'    => 'حقل كذا مطلوب',
            'friday_winter_solider.required'    => 'حقل كذا مطلوب',
            'friday_summer_solider.required'    => 'حقل كذا مطلوب',
            'friday_winter_amen.required'       => 'حقل كذا مطلوب',
            'friday_summer_amen.required'       => 'حقل كذا مطلوب',
        ];
    }

}

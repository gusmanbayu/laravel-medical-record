<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            //
            'polyclinic_id' => ['required'],
            'user_id' => ['required'],
            'name' => ['required'],
            'practice_license' => ['required'],
            'place_birth' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required']
        ];
    }
}

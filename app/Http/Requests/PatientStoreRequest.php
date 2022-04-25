<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'id_card' => ['required', 'max:225'],
            'name' => ['required'],
            'gender' => ['required'],
            'religion' => ['required'],
            'address' => ['required'],
            'datebirth' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'family_name' => ['required'],
            'family_relationship' => ['required']

        ];
    }
}

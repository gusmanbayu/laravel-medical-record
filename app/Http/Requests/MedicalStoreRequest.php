<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalStoreRequest extends FormRequest
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
            'action_id' => ['nullable'],
            'medicine_id' => ['nullable'],
            'user_id' => ['required'],
            'patient_id' => ['required'],
            'diagnose' => ['nullable'],
            'recipe' => ['nullable'],
            'complaint' => ['nullable'],
            'date' => ['required', 'date'],
            'description' => ['nullable', 'max:225'],
            'status' => ['required']


        ];
    }
}

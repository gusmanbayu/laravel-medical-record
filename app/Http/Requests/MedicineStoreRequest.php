<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineStoreRequest extends FormRequest
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
            'medicine.*.name' => ['required', 'max:225'],
            'medicine.*.amount' => ['required', 'numeric'],
            'medicine.*.size' => ['required'],
            'medicine.*.price' => ['required', 'numeric'],
        ];
    }
}

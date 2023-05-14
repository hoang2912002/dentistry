<?php

namespace App\Http\Requests\AdminRequest\TypeOfMedicineRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:type_of_medicines,name',
            'slug' => 'sometimes',
            'activated' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field cannot be left empty!',
            'sometimes' => 'This field is not in the correct sometimes format!',
        ];
    }

    public function passedValidation()
    {
        $this->merge(['slug' => Str::slug($this->name)]);
    }
}

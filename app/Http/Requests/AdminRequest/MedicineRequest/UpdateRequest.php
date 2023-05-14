<?php

namespace App\Http\Requests\AdminRequest\MedicineRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class UpdateRequest extends FormRequest
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
    public function rules()
    {
        $id = request()->route()->medicineModel->id;
        return [
            'name' => 'required|unique:medicines,name,' .$id,
            'slug' => 'sometimes',
            'quantity' => 'required',
            'root' => 'required',
            'price' => 'required',
            'type_of_medicine_id' => 'required',
            'manufacturer_id' => 'required',
            'activated' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'This field cannot be left empty!',
            'unique' => 'This field exists already!',
            'email' => 'This field is not in the correct email format!',
            'sometimes' => 'This field is not in the correct sometimes format!',
        ];
    }

    public function passedValidation()
    {
        $this->merge(['slug' => Str::slug($this->name)]);
    }
}

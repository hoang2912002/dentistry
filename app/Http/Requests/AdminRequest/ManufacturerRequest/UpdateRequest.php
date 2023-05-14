<?php

namespace App\Http\Requests\AdminRequest\ManufacturerRequest;

use App\Rules\PhoneNumber;
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
        $id = request()->route()->manufacturerModel->id;
        return [
            'name' => 'required|unique:manufactureres,name,' .$id,
            'phone_number' => ['required', new PhoneNumber('Số điện thoại này không đúng định dạng!'),'unique:manufactureres,phone_number,' . $id],
            'email' => 'required|email|unique:logins,email,' . $id,
            'slug' => 'sometimes',
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

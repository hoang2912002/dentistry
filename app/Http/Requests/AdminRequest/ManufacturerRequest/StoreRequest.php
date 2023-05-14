<?php

namespace App\Http\Requests\AdminRequest\ManufacturerRequest;

use App\Rules\PhoneNumber;
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
            'name' => 'required|unique:shifts,name',
            'slug' => 'sometimes',
            'email' => 'required|email|unique:manufactureres,email',
            'address' => 'required',
            'phone_number' => ['required', new PhoneNumber('Số điện thoại này không đúng định dạng!'),'unique:manufactureres,phone_number'] ,
            'activated' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field cannot be left empty!',
            'sometimes' => 'This field is not in the correct sometimes format!',
            'unique' => 'This field exists already!',
            'email' => 'This field is not in the correct email format!',
        ];
    }

    public function passedValidation()
    {
        $this->merge(['slug' => Str::slug($this->name)]);
    }
}

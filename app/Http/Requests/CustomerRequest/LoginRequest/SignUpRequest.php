<?php

namespace App\Http\Requests\CustomerRequest\LoginRequest;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
        return [
            'name' => 'required|min:5',
            'phone_number' => ['required', new PhoneNumber('Số điện thoại này không đúng định dạng!'),'unique:logins,phone_number'],
            'birthdate' => 'required|date',
            'gender' => 'required|boolean',
            'email' => 'required|email|unique:logins,email',
            'group' => 'required',
            'password' => 'required|min:6',
            'activated' => 'sometimes',

        ];
        
    }
    public function messages()
    {
        return [
            'required' => 'Trường này không được phép bỏ trống!',
            'min' => 'Trường này quá ngắn!',
            'date' => 'Trường này không đúng định dạng date!',
            'unique' => 'Trường này đã tồn tại!',
            'email' => 'Trường này không đúng định dạng email!',
            'sometimes' => 'Trường này không đúng định dạng sometime!',
            'boolean' => 'Trường này không đúng định dạng boolean!',
        ];
    }
    public function passedValidation()
    {
        $this->merge(['password' => bcrypt($this->password)]);
    }
}

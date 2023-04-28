<?php

namespace App\Http\Requests\AdminRequest\LoginRequest;

use App\Models\AdminModel\LoginModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $id_login = LoginModel::where('email', $this->email)->value('id');
        return [
            'email' => 'required|email|unique:logins,email,' . $id_login,
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'This field cannot be left empty!',
            'email' => 'This field is not in the correct email format!',
            'unique' => 'This account exists already!'
        ];
    }
}

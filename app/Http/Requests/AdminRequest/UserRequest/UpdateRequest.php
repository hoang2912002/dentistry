<?php

namespace App\Http\Requests\AdminRequest\UserRequest;

use App\Models\AdminModel\LoginModel;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
        $id = request()->route()->userModel->login_id;
        //dd($id);
        return [
            'name' => 'required|min:5',
            'phone_number' => ['required', new PhoneNumber('Số điện thoại này không đúng định dạng!'),'unique:logins,phone_number,' . $id],
            'birthdate' => 'required|date',
            'gender' => 'required|boolean',
            'email' => 'required|email|unique:logins,email,' . $id,
            'role' => 'sometimes',
            'activated' => 'sometimes',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'This field cannot be left empty!',
            'string' => 'This field is not in the correct string format!',
            'min' => 'This field is so short!',
            'date' => 'This field is not in the correct date format!',
            'boolean' => 'This field is not in the correct boolean format!',
            'unique' => 'This field exists already!',
            'email' => 'This field is not in the correct email format!',
            'sometimes' => 'This field is not in the correct sometimes format!',
        ];
    }

    public function passedValidation()
    {
        if($this->filled('password')){
            $this->merge(['password' => bcrypt($this->password)]);
        }   
    }
}

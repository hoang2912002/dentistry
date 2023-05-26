<?php

namespace App\Http\Requests\CustomerRequest\AppointmentRequest;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|min:5',
            'phone_number' => ['required', new PhoneNumber('Số điện thoại này không đúng định dạng!'),'unique:books,phone_number'],
            'date_appointment' => 'required|date',
            'shift_id' => 'required',
            'email' => 'required|email',
            'doctor_uuid' => 'required',
            'note' => 'sometimes',
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
        ];
    }
}

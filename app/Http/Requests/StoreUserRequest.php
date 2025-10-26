<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;
use App\Models\User;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:200'],
            'email' => ['required', 'email', 'unique:' . User::class . ',email'],
            'phone_number' => ['sometimes', 'min:10', 'max:20', 'regex:/^[0-9]+$/i'],
            'password' => ['required', Password::min(8)->max(100)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => ['required', 'same:password'],
            'terms' => ['required', 'boolean:strict'],
            'subscribe' => ['required', 'boolean:strict']
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'terms' => $this->terms == 'true' ? true : false,
            'subscribe' => $this->subscribe == 'true' ? true : false
        ]);
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->terms == false) {
                    $validator->errors()->add('terms', 'You must accept the terms and conditions.');
                }
            }
        ];
    }

    public function messages(): array
    {
        return [
            'phone_number.min' => 'The :attribute must be at least :min digits.',
            'phone_number.max' => 'The :attribute may not be greater than :max digits.',
            'phone_number.regex' => 'The :attribute must contain only digits.',
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'password' => Hash::make($this->password)
        ]);
    }
}

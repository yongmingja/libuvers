<?php

namespace Modules\User\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Modules\User\Rules\MatchCurrentPassword;

class UpdatePasswordProfileRequest extends FormRequest
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
            'current_password' => ['string', 'required', new MatchCurrentPassword()],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        toast($errors->first(), 'warning');
    }
}

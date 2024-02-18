<?php

namespace Modules\Users\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        if ($this->isMethod('post'))
        {
            return [
                'name' => 'required|string|max:255|min:1|regex:/^[\p{Arabic}\p{L}a-zA-Z ]+$/u',
                'email' => 'required|string|email|unique:users',
                'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                'role' => 'required|string|in:admin,user',
                'status' => 'required|in:0,1',
            ];
        }

        else
        {
            return [
                'name' => 'required|string|max:255|min:1|regex:/^[\p{Arabic}\p{L}a-zA-Z ]+$/u',
            ];
        }

    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}

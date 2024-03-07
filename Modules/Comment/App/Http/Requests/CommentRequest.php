<?php

namespace Modules\Comment\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'body' => 'required|string|max:1000|min:1|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,><\/;\n\r&؟?! ]+$/u',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}

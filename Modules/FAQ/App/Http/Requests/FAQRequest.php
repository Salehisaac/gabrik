<?php

namespace Modules\FAQ\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'question' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,r&؟?! ]+$/u',
            'answer' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,><\/;\n\r&؟?! ]+$/u',
            'status' => 'required|numeric|in:0,1',
            'tags'=> 'required'
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

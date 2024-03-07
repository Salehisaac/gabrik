<?php

namespace Modules\Menue\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء., ]+$/u',
            'url' => 'required|string|max:500|min:5|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-z-A-Z-0-9]\.[a-zA-Z]{2,}$/u',
            'status' => 'required|numeric|in:0,1',
            'parent_id' => 'nullable|min:1|regex:/^[0-9]+$/u|exists:menus,id',
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

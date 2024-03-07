<?php

namespace Modules\Category\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if ($this->isMethod('post'))
        {
            return [
                'name' => 'required|string|max:255|unique:categories,name|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء., ]+$/u',
                'description' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,><\/;\n\r& ]+$/u',
                'slug' => 'nullable',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
                'status' => 'required|numeric|in:0,1',
                'tags'=> 'required'
            ];
        }

        else
        {
            return
                [
                'name' => 'required|string|max:255|unique:categories,name|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء., ]+$/u',
                'description' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.,><\/;\n\r& ]+$/u',
                'slug' => 'nullable',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|numeric|in:0,1',
                'tags'=> 'required'
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

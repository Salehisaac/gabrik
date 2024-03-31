<?php

namespace Modules\Posts\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if ($this->isMethod('post'))
        {
            return [
                'title' => 'required|string|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.آ,><\/;\n\r& ]+$/u',
                'content' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z۰-۹\-يء.آ,><\/;\n\r& ]+$/u',
                'summary' => 'required|string|max:200|min:5',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
                'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'video' => 'mimetypes:video/mp4,video/mpeg,video/quicktime|max:100000',
                'status' => 'required|numeric|in:0,1',
                'commentable' => 'required|numeric|in:0,1',
                'type' => 'required|string|in:blog,project',
                'tags'=> 'required',
                'category_id' => 'required|regex:/^[0-9]+$/u|exists:categories,id',
            ];
        }

        else
        {
            return [
                'title' => 'required|string|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.آ,><\/;\n\r& ]+$/u',
                'content' => 'required|string|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹يء.آ,><\/;\n\r&: ]+$/u',
                'summary' => 'required|string|max:100|min:5',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
                'video' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:100000',
                'status' => 'required|numeric|in:0,1',
                'commentable' => 'required|numeric|in:0,1',
                'type' => 'required|string|in:blog,project',
                'tags'=> 'required',
                'category_id' => 'required|regex:/^[0-9]+$/u|exists:categories,id',
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

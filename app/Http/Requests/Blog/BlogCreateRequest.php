<?php

namespace app\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|string|unique:blogs',
            'hashtag' => 'required|max:255|string',
            'description' => 'required|string|max:255',
            'photos' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];

    }

}

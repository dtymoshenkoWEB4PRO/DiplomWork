<?php

namespace App\Http\Requests\Personal\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'votes' => 'required|integer',
            'user_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'It is obligatory field',
            'title.string' => 'It is not a string',
        ];
    }
}

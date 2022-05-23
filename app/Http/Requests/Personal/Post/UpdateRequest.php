<?php

namespace App\Http\Requests\Personal\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'votes' => 'required|integer|gt:0',
            'user_id' => 'required|integer',
            'can_anonim_vote' => 'required|integer',
            'visible' => 'required|integer',
        ];
    }
}

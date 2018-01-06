<?php

namespace App\Http\Requests;

class UpdateNewsRequest extends Request
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
        $rules = [
            'title'     => 'required',
            'content'   => 'required',
            'thumbnail'   => 'image|mimes:jpg,gif,png,jpeg|max:2048',
        ];
        return $rules;
    }
}

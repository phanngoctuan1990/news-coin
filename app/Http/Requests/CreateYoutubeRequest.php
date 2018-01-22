<?php

namespace App\Http\Requests;

class CreateYoutubeRequest extends Request
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
            'url'   => 'required'
        ];
        return $rules;
    }
    
    /**
     * Determine message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'url.required'    => 'Bắt buộc nhập link youtube',
        ];
    }
}

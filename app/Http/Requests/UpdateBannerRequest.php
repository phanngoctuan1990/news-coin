<?php

namespace App\Http\Requests;

class UpdateBannerRequest extends Request
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
            'original'   => 'image|mimes:jpg,gif,png,jpeg',
        ];
        return $rules;
    }
}

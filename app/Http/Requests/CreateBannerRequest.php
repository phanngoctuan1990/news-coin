<?php

namespace App\Http\Requests;

class CreateBannerRequest extends Request
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
            'original'   => 'required|image|mimes:jpg,gif,png,jpeg',
            'position'   => 'required'
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
            'original.required'    => 'Bắt buộc nhập hình ảnh',
            'position.required'      => 'Bắt buộc chọn một vị trí hiển thị hình ảnh',
        ];
    }
}

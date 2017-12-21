<?php

namespace App\Http\Requests;

use App\Models\Coin;

class UpdateCoinRequest extends Request
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
            'name'        => 'required',
            'category_coin_id' => 'required|exists:category_coin,id',
            'thumbnail'   => 'image|mimes:jpg,gif,png,jpeg|max:2048',
            'rate'        => 'required',
            'price'       => 'required|numeric',
            'hype'        => 'required|in:'
                        . Coin::TYPE_LOW . ','
                        . Coin::TYPE_HIGH . ','
                        . Coin::TYPE_MEDIUM . ','
                        . Coin::TYPE_VERY_LOW . ','
                        . Coin::TYPE_VERY_HIGH,
            'scam'        => 'required|in:'
                        . Coin::TYPE_LOW . ','
                        . Coin::TYPE_HIGH . ','
                        . Coin::TYPE_MEDIUM . ','
                        . Coin::TYPE_VERY_LOW . ','
                        . Coin::TYPE_VERY_HIGH,
            'moom'        => 'required|in:'
                        . Coin::TYPE_LOW . ','
                        . Coin::TYPE_HIGH . ','
                        . Coin::TYPE_MEDIUM . ','
                        . Coin::TYPE_VERY_LOW . ','
                        . Coin::TYPE_VERY_HIGH,
            'start_date'   => 'required|date_format:d-m-Y',
            'end_date'     => 'required|date_format:d-m-Y',
            'stage'        => 'required|in:'
                        . Coin::TYPE_ICO . ','
                        . Coin::TYPE_SCAM . ','
                        . Coin::TYPE_ENDED . ','
                        . Coin::TYPE_EXCHANGE . ','
                        . Coin::TYPE_ICO_TODAY,
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
            'start_date.required'    => 'Trường ngày bắt đầu bắt buộc nhập.',
            'start_date.date_format' => 'Trường ngày bắt đầu không đúng định dạng d-m-Y.',
            'end_date.required'      => 'Trường ngày kết thúc bắt buộc nhập.',
            'end_date.date_format'   => 'Trường ngày kết thúc không đúng định dạng d-m-Y.',
        ];
    }
}

<?php
namespace App\Http\Requests;

class CreateUserRequest extends Request
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
            'full_name'             => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
            'role_id'               => 'required',
        ];
    }

    /**
     * Determine message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'full_name.required'             => 'Trường tên bắt buộc nhập.',
            'password.required'              => 'Trường mật khẩu bắt buộc nhập.',
            'role_id.required'               => 'Hãy chọn quyền truy cập cho quản trị viên.',
            'password_confirmation.required' => 'Trường xác nhận mật khẩu bắt buộc nhập.',
        ];
    }
}

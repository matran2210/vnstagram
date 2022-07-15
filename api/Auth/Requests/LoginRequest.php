<?php

namespace Api\Auth\Requests;

use App\Http\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'         => 'required|max:50',
            'password'         => 'required|min:1|max:100',
        ];
    }
    
    public function attributes()
    {
        return [
            'username'        => __('Tên đăng nhập'),
            'password'        => __('Mật khẩu'),
        ];
    }
}

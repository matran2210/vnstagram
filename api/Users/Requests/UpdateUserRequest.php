<?php

namespace Api\Users\Requests;

use App\Http\ApiRequest;

class UpdateUserRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'          => 'required',
            'password'         	=> 'required|min:1|max:100',
            're_password'       => 'nullable|max:100',
            'full_name'        	=> 'required',
            'address'			=> 'nullable',
            'date_of_birth'		=> 'nullable',
            'sex'				=> 'nullable',
            'mobile'			=> 'required',
            'email'				=> 'required',
            'permissions'		=> 'nullable'
        ];
    }
    
    public function attributes()
    {
        return [
        	'username'        	=> __('Tên đăng nhập'),
        	'password'        	=> __('Mật khẩu'),
            're_password'       => __('Mật khẩu nhập lại'),
        	'full_name'        	=> __('Tên đầy đủ'),
        	'address'        	=> __('Địa chỉ'),
        	'date_of_birth'     => __('Ngày sinh'),
        	'sex'        		=> __('Giới tính'),
        	'mobile'        	=> __('Số điện thoại'),
        	'email'        		=> __('Email'),
        	'permissions'       => __('Quyền'),
        ];
    }
}

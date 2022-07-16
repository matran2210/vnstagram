<?php

namespace Api\Posts\Requests;

use App\Http\ApiRequest;

class CreatePostRequest extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => 'nullable|max:500',
            'content'         	=> 'nullable|min:1|max:2000',
        ];
    }
    
    public function attributes()
    {
        return [
        	'title'        	   => __('Tiêu đề'),
        	'content'          => __('Nội dung'),
        ];
    }
}

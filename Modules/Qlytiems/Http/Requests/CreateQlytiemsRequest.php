<?php

namespace Modules\Qlytiems\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateQlytiemsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'user_id'=>'required',
            'description'=>'required'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required'     =>  'Vui lòng nhập tên tiệm',
            'description.required'     =>  'Vui lòng nhập mô tả tiệm',
            'user_id.required'     =>  'Vui lòng người quản lý tiệm'
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}

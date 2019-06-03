<?php

namespace Modules\Qlygoithang\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateQlygoithangRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
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
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}

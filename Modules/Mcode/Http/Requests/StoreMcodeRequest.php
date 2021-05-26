<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\Mcode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMcodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mcode_create');
    }

    public function rules()
    {
 return [
            'name' => [
                'string',
                'nullable',
            ],
            'models.*' => [
                'integer',
            ],
            'models' => [
                'array',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

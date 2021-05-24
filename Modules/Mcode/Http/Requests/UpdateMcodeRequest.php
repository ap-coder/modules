<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\Mcode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMcodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mcode_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'product' => [
                'string',
                'nullable',
            ],
        ];
    }
}

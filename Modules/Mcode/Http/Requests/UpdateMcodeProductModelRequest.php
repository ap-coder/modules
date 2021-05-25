<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\McodeProductModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMcodeProductModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mcode_product_model_edit');
    }

    public function rules()
    {
        return [
            'model' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}

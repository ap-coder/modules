<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\McodeFeature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMcodeFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mcode_feature_create');
    }

    public function rules()
    {
        return [
            'mcode' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'source_string' => [
                'string',
                'nullable',
            ],
            'safe_source' => [
                'string',
                'nullable',
            ],
            'client_name' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'product_models.*' => [
                'integer',
            ],
            'product_models' => [
                'array',
            ],
            'defaults' => [
                'string',
                'nullable',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
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

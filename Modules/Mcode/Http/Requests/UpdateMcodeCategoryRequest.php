<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\McodeCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMcodeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mcode_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
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

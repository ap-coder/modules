<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\McodeCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMcodeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mcode_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mcode_categories,id',
        ];
    }
}

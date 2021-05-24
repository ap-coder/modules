<?php

namespace Modules\Mcode\Http\Requests;

use Modules\Mcode\Entities\Mcode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMcodeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mcode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mcodes,id',
        ];
    }
}

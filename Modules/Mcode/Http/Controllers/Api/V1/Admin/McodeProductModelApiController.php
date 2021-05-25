<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Traits\MediaUploadingTrait;
use Modules\Mcode\Http\Requests\StoreMcodeProductModelRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeProductModelRequest;
use Modules\Mcode\Transformers\Admin\McodeProductModelResource;
use Modules\Mcode\Entities\McodeProductModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class McodeProductModelApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mcode_product_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeProductModelResource(McodeProductModel::all());
    }

    public function store(StoreMcodeProductModelRequest $request)
    {
        $mcodeProductModel = McodeProductModel::create($request->all());

        return (new McodeProductModelResource($mcodeProductModel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(McodeProductModel $mcodeProductModel)
    {
        abort_if(Gate::denies('mcode_product_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeProductModelResource($mcodeProductModel);
    }

    public function update(UpdateMcodeProductModelRequest $request, McodeProductModel $mcodeProductModel)
    {
        $mcodeProductModel->update($request->all());

        return (new McodeProductModelResource($mcodeProductModel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(McodeProductModel $mcodeProductModel)
    {
        abort_if(Gate::denies('mcode_product_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeProductModel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

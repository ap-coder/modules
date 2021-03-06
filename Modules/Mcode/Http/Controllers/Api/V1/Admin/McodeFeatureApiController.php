<?php

namespace Modules\Mcode\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Http\Requests\StoreMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeFeatureRequest;
use Modules\Mcode\Transformers\Admin\McodeFeatureResource;
use Modules\Mcode\Entities\McodeFeature;
use Gate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class McodeFeatureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mcode_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeFeatureResource(McodeFeature::with(['product_models', 'categories'])->get());
    }

    public function store(StoreMcodeFeatureRequest $request)
    {
        $mcodeFeature = McodeFeature::create($request->all());
        $mcodeFeature->product_models()->sync($request->input('product_models', []));
        $mcodeFeature->categories()->sync($request->input('categories', []));

        return (new McodeFeatureResource($mcodeFeature))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeFeatureResource($mcodeFeature->load(['product_models', 'categories']));
    }

    public function update(UpdateMcodeFeatureRequest $request, McodeFeature $mcodeFeature)
    {
        $mcodeFeature->update($request->all());
        $mcodeFeature->product_models()->sync($request->input('product_models', []));
        $mcodeFeature->categories()->sync($request->input('categories', []));

        return (new McodeFeatureResource($mcodeFeature))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeFeature->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

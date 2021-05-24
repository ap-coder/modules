<?php

namespace Modules\Mcode\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Mcode\Http\Requests\StoreMcodeCategoryRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeCategoryRequest;
use Modules\Mcode\Transformers\Admin\McodeCategoryResource;
use Modules\Mcode\Entities\McodeCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class McodeCategoryApiController extends Controller
{
    // use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mcode_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeCategoryResource(McodeCategory::all());
    }

    public function store(StoreMcodeCategoryRequest $request)
    {
        $mcodeCategory = McodeCategory::create($request->all());

        if ($request->input('image', false)) {
            $mcodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new McodeCategoryResource($mcodeCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(McodeCategory $mcodeCategory)
    {
        abort_if(Gate::denies('mcode_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new McodeCategoryResource($mcodeCategory);
    }

    public function update(UpdateMcodeCategoryRequest $request, McodeCategory $mcodeCategory)
    {
        $mcodeCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$mcodeCategory->image || $request->input('image') !== $mcodeCategory->image->file_name) {
                if ($mcodeCategory->image) {
                    $mcodeCategory->image->delete();
                }
                $mcodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($mcodeCategory->image) {
            $mcodeCategory->image->delete();
        }

        return (new McodeCategoryResource($mcodeCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(McodeCategory $mcodeCategory)
    {
        abort_if(Gate::denies('mcode_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMCodeCategoryRequest;
use App\Http\Requests\UpdateMCodeCategoryRequest;
use App\Http\Resources\Admin\MCodeCategoryResource;
use App\Models\MCodeCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MCodeCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('m_code_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MCodeCategoryResource(MCodeCategory::all());
    }

    public function store(StoreMCodeCategoryRequest $request)
    {
        $mCodeCategory = MCodeCategory::create($request->all());

        if ($request->input('image', false)) {
            $mCodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new MCodeCategoryResource($mCodeCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MCodeCategoryResource($mCodeCategory);
    }

    public function update(UpdateMCodeCategoryRequest $request, MCodeCategory $mCodeCategory)
    {
        $mCodeCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$mCodeCategory->image || $request->input('image') !== $mCodeCategory->image->file_name) {
                if ($mCodeCategory->image) {
                    $mCodeCategory->image->delete();
                }
                $mCodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($mCodeCategory->image) {
            $mCodeCategory->image->delete();
        }

        return (new MCodeCategoryResource($mCodeCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

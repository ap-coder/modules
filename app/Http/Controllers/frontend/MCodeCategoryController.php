<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMCodeCategoryRequest;
use App\Http\Requests\StoreMCodeCategoryRequest;
use App\Http\Requests\UpdateMCodeCategoryRequest;
use App\Models\MCodeCategory;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MCodeCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('m_code_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeCategories = MCodeCategory::with(['compatible_products'])->get();

        return view('frontend.mCodeCategories.index', compact('mCodeCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('m_code_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compatible_products = Product::all()->pluck('name', 'id');

        return view('frontend.mCodeCategories.create', compact('compatible_products'));
    }

    public function store(StoreMCodeCategoryRequest $request)
    {
        $mCodeCategory = MCodeCategory::create($request->all());
        $mCodeCategory->compatible_products()->sync($request->input('compatible_products', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mCodeCategory->id]);
        }

        return redirect()->route('frontend.m-code-categories.index');
    }

    public function edit(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compatible_products = Product::all()->pluck('name', 'id');

        $mCodeCategory->load('compatible_products');

        return view('frontend.mCodeCategories.edit', compact('compatible_products', 'mCodeCategory'));
    }

    public function update(UpdateMCodeCategoryRequest $request, MCodeCategory $mCodeCategory)
    {
        $mCodeCategory->update($request->all());
        $mCodeCategory->compatible_products()->sync($request->input('compatible_products', []));

        return redirect()->route('frontend.m-code-categories.index');
    }

    public function show(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeCategory->load('compatible_products');

        return view('frontend.mCodeCategories.show', compact('mCodeCategory'));
    }

    public function destroy(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMCodeCategoryRequest $request)
    {
        MCodeCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('m_code_category_create') && Gate::denies('m_code_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MCodeCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

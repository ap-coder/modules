<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMCodeFeatureRequest;
use App\Http\Requests\StoreMCodeFeatureRequest;
use App\Http\Requests\UpdateMCodeFeatureRequest;
use App\Models\MCodeCategory;
use App\Models\MCodeFeature;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MCodeFeatureController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('m_code_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeFeatures = MCodeFeature::with(['mcode_categories', 'media'])->get();

        return view('frontend.mCodeFeatures.index', compact('mCodeFeatures'));
    }

    public function create()
    {
        abort_if(Gate::denies('m_code_feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcode_categories = MCodeCategory::all()->pluck('published', 'id');

        return view('frontend.mCodeFeatures.create', compact('mcode_categories'));
    }

    public function store(StoreMCodeFeatureRequest $request)
    {
        $mCodeFeature = MCodeFeature::create($request->all());
        $mCodeFeature->mcode_categories()->sync($request->input('mcode_categories', []));
        if ($request->input('feature_image', false)) {
            $mCodeFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('feature_image'))))->toMediaCollection('feature_image');
        }

        if ($request->input('featured_image', false)) {
            $mCodeFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mCodeFeature->id]);
        }

        return redirect()->route('frontend.m-code-features.index');
    }

    public function edit(MCodeFeature $mCodeFeature)
    {
        abort_if(Gate::denies('m_code_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcode_categories = MCodeCategory::all()->pluck('published', 'id');

        $mCodeFeature->load('mcode_categories');

        return view('frontend.mCodeFeatures.edit', compact('mcode_categories', 'mCodeFeature'));
    }

    public function update(UpdateMCodeFeatureRequest $request, MCodeFeature $mCodeFeature)
    {
        $mCodeFeature->update($request->all());
        $mCodeFeature->mcode_categories()->sync($request->input('mcode_categories', []));
        if ($request->input('feature_image', false)) {
            if (!$mCodeFeature->feature_image || $request->input('feature_image') !== $mCodeFeature->feature_image->file_name) {
                if ($mCodeFeature->feature_image) {
                    $mCodeFeature->feature_image->delete();
                }
                $mCodeFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('feature_image'))))->toMediaCollection('feature_image');
            }
        } elseif ($mCodeFeature->feature_image) {
            $mCodeFeature->feature_image->delete();
        }

        if ($request->input('featured_image', false)) {
            if (!$mCodeFeature->featured_image || $request->input('featured_image') !== $mCodeFeature->featured_image->file_name) {
                if ($mCodeFeature->featured_image) {
                    $mCodeFeature->featured_image->delete();
                }
                $mCodeFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($mCodeFeature->featured_image) {
            $mCodeFeature->featured_image->delete();
        }

        return redirect()->route('frontend.m-code-features.index');
    }

    public function show(MCodeFeature $mCodeFeature)
    {
        abort_if(Gate::denies('m_code_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeFeature->load('mcode_categories');

        return view('frontend.mCodeFeatures.show', compact('mCodeFeature'));
    }

    public function destroy(MCodeFeature $mCodeFeature)
    {
        abort_if(Gate::denies('m_code_feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeFeature->delete();

        return back();
    }

    public function massDestroy(MassDestroyMCodeFeatureRequest $request)
    {
        MCodeFeature::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('m_code_feature_create') && Gate::denies('m_code_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MCodeFeature();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

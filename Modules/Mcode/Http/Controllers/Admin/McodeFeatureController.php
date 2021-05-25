<?php

namespace Modules\Mcode\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Http\Requests\MassDestroyMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\StoreMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeFeatureRequest;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Entities\McodeFeature;
use App\Models\ProductModel;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class McodeFeatureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mcode_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeFeatures = McodeFeature::with(['product_models', 'categories'])->get();

        return view('mcode::admin.mcodeFeatures.index', compact('mcodeFeatures'));
    }

    public function create()
    {
        abort_if(Gate::denies('mcode_feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = 'App\Models\\' . \Str::studly(\Str::singular('ProductModel'));
        if (is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
            $product_models = ProductModel::all()->pluck('name', 'id');
        }else{
            $product_models=array();
        }

        

        $categories = McodeCategory::all()->pluck('name', 'id');

        return view('mcode::admin.mcodeFeatures.create', compact('product_models', 'categories'));
    }

    public function store(StoreMcodeFeatureRequest $request)
    {
        $mcodeFeature = McodeFeature::create($request->all());
        $mcodeFeature->product_models()->sync($request->input('product_models', []));
        $mcodeFeature->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.mcode-features.index');
    }

    public function edit(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_models = ProductModel::all()->pluck('name', 'id');

        $categories = McodeCategory::all()->pluck('name', 'id');

        $mcodeFeature->load('product_models', 'categories');

        return view('mcode::admin.mcodeFeatures.edit', compact('product_models', 'categories', 'mcodeFeature'));
    }

    public function update(UpdateMcodeFeatureRequest $request, McodeFeature $mcodeFeature)
    {
        $mcodeFeature->update($request->all());
        $mcodeFeature->product_models()->sync($request->input('product_models', []));
        $mcodeFeature->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.mcode-features.index');
    }

    public function show(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeFeature->load('product_models', 'categories');

        return view('mcode::admin.mcodeFeatures.show', compact('mcodeFeature'));
    }

    public function destroy(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeFeature->delete();

        return back();
    }

    public function massDestroy(MassDestroyMcodeFeatureRequest $request)
    {
        McodeFeature::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace Modules\Mcode\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Http\Requests\MassDestroyMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\StoreMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeFeatureRequest;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Entities\McodeFeature;
use Modules\Mcode\Entities\McodeProductModel;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class McodeFeatureController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mcode_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = McodeFeature::with(['categories', 'models'])->select(sprintf('%s.*', (new McodeFeature())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mcode_feature_show';
                $editGate = 'mcode_feature_edit';
                $deleteGate = 'mcode_feature_delete';
                $crudRoutePart = 'mcode-features';

                return view('mcode::partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('mcode', function ($row) {
                return $row->mcode ? $row->mcode : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            // $table->editColumn('defaults', function ($row) {
            //     return $row->defaults ? $row->defaults : '';
            // });
            $table->editColumn('categories', function ($row) {
                $labels = [];
                foreach ($row->categories as $category) {
                    $labels[] = sprintf('<span class="btn btn-outline-primary">%s</span>', $category->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('models', function ($row) {
                $labels = [];
                foreach ($row->models as $model) {
                    $labels[] = sprintf('<span class="btn btn-outline-primary">%s</span>', $model->model);
                }

                return implode(' ', $labels);
            });
            // $table->editColumn('order', function ($row) {
            //     return $row->order ? $row->order : '';
            // });

            $table->rawColumns(['actions', 'placeholder', 'published', 'categories', 'models']);

            return $table->make(true);
        }

        return view('mcode::admin.mcodeFeatures.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mcode_feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = McodeCategory::all()->pluck('name', 'id');

        $models = McodeProductModel::all()->pluck('model', 'id');

        return view('mcode::admin.mcodeFeatures.create', compact('categories', 'models'));
    }

    public function store(StoreMcodeFeatureRequest $request)
    {
        $mcodeFeature = McodeFeature::create($request->all());
        $mcodeFeature->categories()->sync($request->input('categories', []));
        $mcodeFeature->models()->sync($request->input('models', []));

        return redirect()->route('admin.mcode-features.index');
    }

    public function edit(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = McodeCategory::all()->pluck('name', 'id');

        $models = McodeProductModel::all()->pluck('model', 'id');

        $mcodeFeature->load('categories', 'models');

        return view('mcode::admin.mcodeFeatures.edit', compact('categories', 'models', 'mcodeFeature'));
    }

    public function update(UpdateMcodeFeatureRequest $request, McodeFeature $mcodeFeature)
    {
        $mcodeFeature->update($request->all());
        $mcodeFeature->categories()->sync($request->input('categories', []));
        $mcodeFeature->models()->sync($request->input('models', []));

        return redirect()->route('admin.mcode-features.index');
    }

    public function show(McodeFeature $mcodeFeature)
    {
        abort_if(Gate::denies('mcode_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeFeature->load('categories', 'models');

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

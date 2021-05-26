<?php

namespace Modules\Mcode\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Traits\MediaUploadingTrait;
use Modules\Mcode\Http\Requests\MassDestroyMcodeProductModelRequest;
use Modules\Mcode\Http\Requests\StoreMcodeProductModelRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeProductModelRequest;
use Modules\Mcode\Entities\McodeProductModel;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class McodeProductModelController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mcode_product_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = McodeProductModel::query()->select(sprintf('%s.*', (new McodeProductModel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mcode_product_model_show';
                $editGate = 'mcode_product_model_edit';
                $deleteGate = 'mcode_product_model_delete';
                $crudRoutePart = 'mcode-product-models';

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
            $table->editColumn('model', function ($row) {
                return $row->model ? $row->model : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('mcode::admin.mcodeProductModels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mcode_product_model_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('mcode::admin.mcodeProductModels.create');
    }

    public function store(StoreMcodeProductModelRequest $request)
    {
        $mcodeProductModel = McodeProductModel::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mcodeProductModel->id]);
        }

        return redirect()->route('admin.mcode-product-models.index');
    }

    public function edit(McodeProductModel $mcodeProductModel)
    {
        abort_if(Gate::denies('mcode_product_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('mcode::admin.mcodeProductModels.edit', compact('mcodeProductModel'));
    }

    public function update(UpdateMcodeProductModelRequest $request, McodeProductModel $mcodeProductModel)
    {
        $mcodeProductModel->update($request->all());

        return redirect()->route('admin.mcode-product-models.index');
    }

    public function show(McodeProductModel $mcodeProductModel)
    {
        abort_if(Gate::denies('mcode_product_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeProductModel->load('modelsMcodeFeatures', 'modelsMcodes');

        return view('mcode::admin.mcodeProductModels.show', compact('mcodeProductModel'));
    }

    public function destroy(McodeProductModel $mcodeProductModel)
    {
        abort_if(Gate::denies('mcode_product_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeProductModel->delete();

        return back();
    }

    public function massDestroy(MassDestroyMcodeProductModelRequest $request)
    {
        McodeProductModel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mcode_product_model_create') && Gate::denies('mcode_product_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new McodeProductModel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

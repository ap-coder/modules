<?php

namespace Modules\Mcode\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Entities\Mcode;
use Modules\Mcode\Entities\McodeProductModel;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Traits\MediaUploadingTrait;

use Modules\Mcode\Http\Requests\MassDestroyMcodeRequest;
use Modules\Mcode\Http\Requests\StoreMcodeRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeRequest;

use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class McodeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mcode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Mcode::query()->select(sprintf('%s.*', (new Mcode())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                    $viewGate = 'mcode_show';
                    $editGate = 'mcode_edit';
                    $deleteGate = 'mcode_delete';
                    $crudRoutePart = 'mcodes';

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

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->editColumn('models', function ($row) {
                $labels = [];
                foreach ($row->models as $model) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $model->model);
                }

                return implode(' ', $labels);
            });
	        $table->editColumn('chicklets', function ($row) {
		        return $row->chicklets ? Mcode::CHICKLETS_SELECT[$row->chicklets] : '';
	        });
	        $table->editColumn('order', function ($row) {
		        return $row->order ? $row->order : '';
	        });

            $table->rawColumns(['actions', 'placeholder', 'photo','models']);

            return $table->make(true);
        }

        return view('mcode::admin.mcodes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mcode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $models=McodeProductModel::get()->pluck('model', 'id');
        return view('mcode::admin.mcodes.create',compact('models'));
    }

    public function store(StoreMcodeRequest $request)
    {
        $mcode = Mcode::create($request->all());
        $mcode->models()->sync($request->input('models', []));

        if ($request->input('photo', false)) {
            $mcode->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mcode->id]);
        }

        return redirect()->route('admin.mcodes.index');
    }

    public function edit(Mcode $mcode)
    {
        abort_if(Gate::denies('mcode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $models=McodeProductModel::get()->pluck('model', 'id');

        return view('mcode::admin.mcodes.edit', compact('mcode','models'));
    }

    public function update(UpdateMcodeRequest $request, Mcode $mcode)
    {
        $mcode->update($request->all());
        $mcode->models()->sync($request->input('models', []));

        if ($request->input('photo', false)) {
            if (!$mcode->photo || $request->input('photo') !== $mcode->photo->file_name) {
                if ($mcode->photo) {
                    $mcode->photo->delete();
                }
                $mcode->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($mcode->photo) {
            $mcode->photo->delete();
        }

        return redirect()->route('admin.mcodes.index');
    }

    public function show(Mcode $mcode)
    {
        abort_if(Gate::denies('mcode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('mcode::admin.mcodes.show', compact('mcode'));
    }

    public function destroy(Mcode $mcode)
    {
        abort_if(Gate::denies('mcode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcode->delete();

        return back();
    }

    public function massDestroy(MassDestroyMcodeRequest $request)
    {
        Mcode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mcode_create') && Gate::denies('mcode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Mcode();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

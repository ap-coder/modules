<?php

namespace Modules\Mcode\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Mcode\Http\Requests\MassDestroyMcodeCategoryRequest;
use Modules\Mcode\Http\Requests\StoreMcodeCategoryRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeCategoryRequest;
use Modules\Mcode\Entities\McodeCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class McodeCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mcode_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = McodeCategory::query()->select(sprintf('%s.*', (new McodeCategory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mcode_category_show';
                $editGate = 'mcode_category_edit';
                $deleteGate = 'mcode_category_delete';
                $crudRoutePart = 'mcode-categories';

                return view('partials.datatablesActions', compact(
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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published', 'image']);

            return $table->make(true);
        }

        return view('admin.mcodeCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mcode_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mcodeCategories.create');
    }

    public function store(StoreMcodeCategoryRequest $request)
    {
        $mcodeCategory = McodeCategory::create($request->all());

        if ($request->input('image', false)) {
            $mcodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mcodeCategory->id]);
        }

        return redirect()->route('admin.mcode-categories.index');
    }

    public function edit(McodeCategory $mcodeCategory)
    {
        abort_if(Gate::denies('mcode_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mcodeCategories.edit', compact('mcodeCategory'));
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

        return redirect()->route('admin.mcode-categories.index');
    }

    public function show(McodeCategory $mcodeCategory)
    {
        abort_if(Gate::denies('mcode_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeCategory->load('categoriesMcodeFeatures');

        return view('admin.mcodeCategories.show', compact('mcodeCategory'));
    }

    public function destroy(McodeCategory $mcodeCategory)
    {
        abort_if(Gate::denies('mcode_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mcodeCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMcodeCategoryRequest $request)
    {
        McodeCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mcode_category_create') && Gate::denies('mcode_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new McodeCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

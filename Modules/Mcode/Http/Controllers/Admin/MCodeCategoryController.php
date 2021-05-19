<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMCodeCategoryRequest;
use App\Http\Requests\StoreMCodeCategoryRequest;
use App\Http\Requests\UpdateMCodeCategoryRequest;
use App\Models\MCodeCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MCodeCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('m_code_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MCodeCategory::query()->select(sprintf('%s.*', (new MCodeCategory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'm_code_category_show';
                $editGate = 'm_code_category_edit';
                $deleteGate = 'm_code_category_delete';
                $crudRoutePart = 'm-code-categories';

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

        return view('admin.mCodeCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('m_code_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mCodeCategories.create');
    }

    public function store(StoreMCodeCategoryRequest $request)
    {
        $mCodeCategory = MCodeCategory::create($request->all());

        if ($request->input('image', false)) {
            $mCodeCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mCodeCategory->id]);
        }

        return redirect()->route('admin.m-code-categories.index');
    }

    public function edit(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mCodeCategories.edit', compact('mCodeCategory'));
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

        return redirect()->route('admin.m-code-categories.index');
    }

    public function show(MCodeCategory $mCodeCategory)
    {
        abort_if(Gate::denies('m_code_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mCodeCategory->load('categoriesMcodeFeatures');

        return view('admin.mCodeCategories.show', compact('mCodeCategory'));
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

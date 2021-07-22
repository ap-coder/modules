<?php

namespace  Modules\Mcode\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Traits\MediaUploadingTrait;
use Modules\Mcode\Http\Requests\StoreMcodeRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeRequest;
use Modules\Mcode\Transformers\Admin\McodeResource;
use Modules\Mcode\Entities\Mcode;
use Modules\Mcode\Entities\McodeFeature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class McodeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        if(!auth()->user()->tokenCan('mcode_api_access')){
            abort(403, 'YOU DO NOT HAVE ACCESS.');
        }

        return new McodeResource(Mcode::with(['models'])->get());
    }

    public function store(StoreMcodeRequest $request)
    {
 

        $mcode = Mcode::create($request->all());

        $mcode->models()->sync($request->input('models', []));


        if ($request->input('photo', false)) {
            $mcode->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new McodeResource($mcode))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function storePost(Request $request)
    {
 

        $mcode = Mcode::create($request->all());
        
        $mcode->models()->sync($request->input('validProducts', []));


        if ($request->input('photo', false)) {
            $mcode->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new McodeResource($mcode))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Mcode $mcode)
    {
        //abort_if(Gate::denies('mcode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(!auth()->user()->tokenCan('mcode_api_access')){
            abort(403, 'YOU DO NOT HAVE ACCESS.');
        }

        return new McodeResource($mcode->load(['models']));
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

        return (new McodeResource($mcode))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Mcode $mcode)
    {
        //abort_if(Gate::denies('mcode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(!auth()->user()->tokenCan('mcode_delete')){
            abort(403, 'YOU DO NOT HAVE ACCESS.');
        }

        $mcode->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
 
<?php

namespace Modules\Mcode\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Modules\Mcode\Http\Requests\StoreMcodeFeatureRequest;
use Modules\Mcode\Http\Requests\UpdateMcodeFeatureRequest;
use Modules\Mcode\Transformers\Admin\McodeFeatureResource;
use Modules\Mcode\Entities\McodeFeature;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Entities\McodeProductModel;
use Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class McodeFeatureApiController extends Controller
{

	public function index()
	{
		//abort_if(Gate::denies('mcode_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		if ( ! auth()->user()->tokenCan('mcode_api_access')) {
			abort(403, 'YOU DO NOT HAVE ACCESS.');
		}
		
		return new McodeFeatureResource(McodeFeature::with(['product_models', 'categories'])->get());
	}
	
	public function store(StoreMcodeFeatureRequest $request)
	{
		$mcodeFeature = McodeFeature::create($request->all());
		$mcodeFeature->product_models()->sync($request->input('product_models', []));
		$mcodeFeature->categories()->sync($request->input('categories', []));
		
		return (new McodeFeatureResource($mcodeFeature))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}
	
	public function storePost(StoreMcodeFeatureRequest $request)
	{
		$data = $request->all();
		
		 
			// \Log::warning("UPDATE_OR_INSERT_MCODE: ". $request->input('code'));
        try{
			
			$mcodeFeature = McodeFeature::updateOrCreate(
				['mcode' => $request->input('mcode')],
				[
					'published'          => $request->input('published'),
					'mcode'              => $request->input('mcode'),
					'name'               => $request->input('name'),
					'description'        => $request->input('description'),
					'source_string'      => $request->input('source_string'),
					'client_name'        => $request->input('name'),
					'client_description' => $request->input('description'),
					'defaults'           => str_replace('Null', '', $request->input('defaults')),
					'updated_at'         => now()
					// 'created_at' => is_null($mcodeFeature->created_at) ? $mcodeFeature->created_at : now()
				]
			);
			
			$mcodeFeature = McodeFeature::find($mcodeFeature->id);

			\Log::warning("FEATURE | UPDATE_OR_INSERT | MCODE: " . $mcodeFeature->mcode . " ID: " . $mcodeFeature->id);

			$mcodeCategories = McodeCategory::updateOrCreate(
				['name' => $request->input('category')],
				[
					'published'  => '1',
					'name'       => $request->input('category'),
					'updated_at' => now(),
					'created_at' => now()
				]
			);
			
			$mcodeFeature->categories()->detach();
			$mcodeFeature->categories()->sync($mcodeCategories);
			\Log::warning("CATEGORY | UPDATE_OR_INSERT | CATEGORY: " . $mcodeCategories->name . " CAT_ID: " . $mcodeCategories->id );

			if (request('product_models')) {
				$models      = request('product_models');
				$modelsUpper = strtoupper($models);
				$var         = explode(',', $modelsUpper);
                
                $mods = [];
				
                foreach ($var as $model) {
					$mcodeModel = McodeProductModel::updateOrCreate(
						[
							'model' => $model
						],
						[
							'published'  => '1',
							'model'      => $model,
							'slug'       => Str::slug($model, '-'),
							'updated_at' => now(),
							'created_at' => now()
						]
					);

                    $mods[] = $mcodeModel->id; 
					
					\Log::warning("PRODUCT_MODEL | UPDATE_OR_INSERT | MODEL: ". $mcodeModel->model ." MODEL_ID: ". $mcodeModel->id ." ". Str::slug($model, '-')); 
                }

                // dd($mods);
                $mcodeFeature->models()->sync($mods);
			}
			
			return response()->json([
				"message" => "Recorded successfully",
				"content" => $data 
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Not Recorded",
                "Caught Exception" => $e->getMessage()
            ], 400);
        }
 
	}
	
	public function storeMultiPost(StoreMcodeFeatureRequest $request)
	{
		$data = $request->all();
		
		try{

		$mcodes = [];
		foreach ($data as $row) {
			$mcodeFeature = McodeFeature::updateOrCreate(
				['mcode' => $row['mcode']],
				[
					'published'          => '1',
					'mcode'              => $row['mcode'],
					'name'               => $row['name'],
					'description'        => $row['description'],
					'client_name'        => $row['client_name'],
					'client_description' => $row['client_description'],
					'source_string'      => $row['source_string'],
 
				]
			);
			$mcodes[] = $mcodeFeature->id;

			$mcodeFeature = McodeFeature::find($mcodeFeature->id);

			$mcodeCategories = McodeCategory::updateOrCreate(
				['name' => $row['category']],
				[
					'published'  => '1',
					'name'       => $row['category'],
					'updated_at' => now(),
					'created_at' => now()
				]
			);

			$mcodeFeature->categories()->detach();
			$mcodeFeature->categories()->sync($mcodeCategories);

			if ($row['product_models']) {

				$models      = $row['product_models'];
                
                $mods = [];
				
                foreach ($models as $model) {
					$model=strtoupper($model);
					$mcodeModel = McodeProductModel::updateOrCreate(
						[
							'model' => $model
						],
						[
							'published'  => '1',
							'model'      => $model,
							'slug'       => Str::slug($model, '-'),
							'updated_at' => now(),
							'created_at' => now()
						]
					);

                    $mods[] = $mcodeModel->id; 
					
                }

                // dd($mods);
                $mcodeFeature->models()->sync($mods);
			}

		} 
        return response()->json([
			"message" => "Recorded successfully",
			"content" => $data
		], 201);

		} catch (Exception $e) {
			return response()->json([
				"message" => "Not Recorded",
				"Caught Exception" => $e->getMessage()
			], 400);
		}
	}



	// public function storeMultiPost(StoreMcodeFeatureRequest $request)
	// {
		
 	// 	try {
 	// 		collect($request->all())
	// 		->map(function (array $row) {
	// 		    return Arr::only($row, ['mcode','published','name','description','souce_string','defaults']);
	// 		})
	// 		->chunk(10)
	// 		->each(function (Collection $chunk) {
	// 		    McodeFeature::upsert($chunk->all(),['mcode','name'],['mcode','published','name','souce_string']);
	// 		});
			
	// 		return response()->json(['response' => "Added to Features."], 200);

 	// 	}catch (Exception $e) {
    //         return response()->json([
    //             "message" => "Not Recorded",
    //             "Caught Exception" => $e->getMessage()
    //         ], 400);
    //     }

	// }
	
	public function show(McodeFeature $mcodeFeature) {
		//abort_if(Gate::denies('mcode_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		if ( ! auth()->user()->tokenCan('mcode_api_access')) {
			abort(403, 'YOU DO NOT HAVE ACCESS.');
		}
		
		return new McodeFeatureResource($mcodeFeature->load(['product_models', 'categories']));
	}
	
	public
	function update(
		UpdateMcodeFeatureRequest $request,
		McodeFeature $mcodeFeature
	) {
		$mcodeFeature->update($request->all());
		$mcodeFeature->product_models()->sync($request->input('product_models', []));
		$mcodeFeature->categories()->sync($request->input('categories', []));
		
		return (new McodeFeatureResource($mcodeFeature))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}
	
	public
	function destroy(
		McodeFeature $mcodeFeature
	) {
		//abort_if(Gate::denies('mcode_feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		if ( ! auth()->user()->tokenCan('mcode_api_access')) {
			abort(403, 'YOU DO NOT HAVE ACCESS.');
		}
		
		$mcodeFeature->delete();
		
		return response(null, Response::HTTP_NO_CONTENT);
	}
}

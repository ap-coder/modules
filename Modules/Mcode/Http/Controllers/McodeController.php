<?php

namespace Modules\Mcode\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Mcode::Entities\McodeCategory;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Entities\McodeFeature;
use SimpleSoftwareIO\QrCode\Facades\QrCode; 
use Modules\Mcode\Entities\Mcode;
use Modules\Mcode\Entities\McodeProductModel;
use App\Models\User;
use Modules\Mcode\Helpers;


class McodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $model = 'App\Models\\' . \Str::studly(\Str::singular('ProductModel'));
        // if (is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
        //     //parent model run here
        // }else{
        //     //mcode model run here
        // }
	    
        $mcodes = Mcode::published()->get();
        $categories = McodeCategory::with('categoriesMcodeFeatures')->get();
        $features = McodeFeature::all();

        // dd($mcodes);


        return view('mcode::site.mcodes.index', compact('mcodes', 'features', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('mcode::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('mcode::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('mcode::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function category()
    {
        $categories = McodeCategory::orderBy('order','ASC')->get();
        return view('mcode::site.mcodes.steps.category',compact('categories'));
    }

    public function feature()
    {
        $categories = McodeCategory::orderBy('order','ASC')->get();
        return view('mcode::site.mcodes.steps.feature',compact('categories'));
    }

    public function getQrModalDetails(Request $request)
    {
        $feature = McodeFeature::where('id',$request->id)->first();
        $html = view('mcode::site.mcodes.steps.qr-modal', compact('feature'))->render();
        $data['html']=$html;
        echo json_encode($data);
    }
}

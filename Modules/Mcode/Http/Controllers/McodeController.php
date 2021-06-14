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

use PDF;
use Modules\Mcode\Helpers\Format;


class McodeController extends Controller
{
	public function __construct()
	{
	
	}
	
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
	
        
        // dd(Format::combinedSource("YEA IT WORKED."));


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

    public function getFeature(Request $request)
    {
        $ids=$request->ids;
        $categories = McodeCategory::whereIn('id',$ids)->orderBy('order','ASC')->get();
        $filterCategories = McodeCategory::orderBy('order','ASC')->get();
        
        $html = view('mcode::site.mcodes.steps.feature',compact('categories','filterCategories'))->render();
        
        $data['html']=$html;
        
        echo json_encode($data);
    }

    public function getQrModalDetails(Request $request)
    {
        $productID=$request->productID;
        $product = Mcode::where('id',$productID)->first();
        $feature = McodeFeature::where('id',$request->id)->first();
        $html = view('mcode::site.mcodes.steps.qr-modal', compact('feature','product'))->render();
        $data['html']=$html;
        echo json_encode($data);
    }

    public function getGenerateModalDetails(Request $request)
    {
        $ids=$request->ids;
        $features = McodeFeature::whereIn('id',$ids)->get();
        $html = view('mcode::site.mcodes.steps.generate-modal', compact('features'))->render();
        $data['html']=$html;
        echo json_encode($data);
    }

    public function generatePdf(Request $request){

        $data = [
            'title' => 'Testing PDF download for new feature!'
        ];
        $pdf = PDF::loadView('mcode::pdf.document', compact('data'));
        
        // return $pdf->stream('document.pdf');
        return $pdf->download('document.pdf');

    }

    public function viewPdf(Request $request){

        $data = [
            'title' => 'Code Configuration Guide!'
        ];

        $pdf = PDF::loadView('mcode::pdf.document', compact('data'));
        
  
        return $pdf->stream('document.pdf');

    }
}

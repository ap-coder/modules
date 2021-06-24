<?php

namespace Modules\Mcode\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Mcode::Entities\McodeCategory;
use Modules\Mcode\Entities\McodeCategory;
use Modules\Mcode\Entities\McodeFeature;
// use SimpleSoftwareIO\QrCode\Facades\QrCode; 
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
	    $productModels = McodeProductModel::all();
        $mcodes = Mcode::published()->get();
        $categories = McodeCategory::with('categoriesMcodeFeatures')->get();

        // $categories=\DB::table('mcode_features')
        //     ->leftJoin('mcode_feature_mcode_product_model', 'mcode_features.id', '=', 'mcode_feature_mcode_product_model.mcode_feature_id')
        //     ->leftJoin('mcode_category_mcode_feature', 'mcode_features.id', '=', 'mcode_category_mcode_feature.mcode_feature_id')
        //     ->leftJoin('mcode_categories', 'mcode_category_mcode_feature.mcode_category_id', '=', 'mcode_category_mcode_feature.mcode_category_id')
        //     ->select('mcode_categories.*')
        //     ->whereIn('mcode_feature_mcode_product_model.mcode_product_model_id', $productModels)
        //     ->where('mcode_categories.name', '!=','Obsolete')
        //     ->groupBy('mcode_categories.id')
        //     ->get();
        
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

        $productID=$request->productID;
        $categoryIDs=explode(',',$request->categoryIDs);
        $featureIDs=explode(',',$request->featureIDs);

        $product = Mcode::where('id',$productID)->first();
        $features = McodeFeature::whereIn('id',$featureIDs)->get();
        $categories = McodeCategory::whereIn('id',$categoryIDs)->get();

    
        $source_strings = implode(' ', $features->pluck('source_string')->toArray());
        $combined_string = Format::combinedSource($source_strings);
 

        \Log::info($combined_string);

        $config = ['instanceConfigurator' => function($mpdf) {
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);

            ob_start();
            // $mpdf->page = 0;
            // $mpdf->state = 0;
            // unset($mpdf->pages[0]);
            // $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
     
            // $mpdf->max_colH_correction = 1.3;
            // $mpdf->KeepColumns = true;

            $mpdf->h2toc = array(
                'H1' => 0,             
            );

            $mpdf->WriteHTML(ob_get_clean());
        }];
       
        // $data = [
        //     'content' => 
        // ];

        $pdf = PDF::loadView('mcode::pdf.document', compact('combined_string', 'product','features','categories'),[], $config);
        
        $formatted_name = str_replace(' ', '_', $product->name);

        $name=$formatted_name.'_full_config.pdf';

        return $pdf->stream($name);
        // return $pdf->download('document.pdf');

    }

    public function getSinglePdf(Request $request){

        $productID=$request->productID;
        $categoryIDs=explode(',',$request->categoryIDs);
        $featureIDs=$request->featureIDs;

        $product = Mcode::where('id',$productID)->first();
        $feature = McodeFeature::where('id',$featureIDs)->first();
        $categories = McodeCategory::whereIn('id',$categoryIDs)->get();

        $config = ['instanceConfigurator' => function($mpdf) {
            // $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            // $mpdf->SetDisplayMode('fullwidth');
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);
            // $mpdf->SetWatermarkText("CODE", false);
            // $mpdf->showWatermarkText = true;
            // $mpdf->watermark_font = 'DejaVuSansCondensed';
            // $mpdf->watermarkTextAlpha = 0.1;
            // $mpdf->TOCpagebreak();

        }];
       
        // $data = [
        //     'content' => 'Code Configuration Guide!'
        // ];

        $pdf = PDF::loadView('mcode::pdf.single-qr-ducument', compact('product','feature','categories'),[], $config);

        $formatted_name = str_replace(' ', '_', $product->name);

        $name=$formatted_name.'_'.$feature->mcode.'_config.pdf';
        return $pdf->stream($name);
        // return $pdf->download('document.pdf');

    }

    public function viewPdf(Request $request){

        $data = [
            'title' => 'Code Configuration Guide!'
        ];        

        $pdf = PDF::loadView('mcode::pdf.document', compact('data'));
        
  
        return $pdf->stream('document.pdf');

    }
}

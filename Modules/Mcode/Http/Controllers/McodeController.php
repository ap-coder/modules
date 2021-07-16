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
        $mcodes = Mcode::all();
        $categories = McodeCategory::with('categoriesMcodeFeatures')->orderBy('order','ASC')->get();

        
	   // $features = McodeFeature::all();

    //    $features = McodeFeature::m1()->get();
        
        // dd(Format::combinedSource("YEA IT WORKED."));


        // dd($features);


        return view('mcode::site.mcodes.index', compact('mcodes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('mcode::create');
    }

    public function getCategory(Request $request)
    {
        $productID=$request->productID;

        $mcode = Mcode::where('id',$productID)->first();
        $productModels=$mcode->models->pluck('id')->toArray();

        $categories=\DB::table('mcode_features')
        ->leftJoin('mcode_feature_mcode_product_model', 'mcode_features.id', '=', 'mcode_feature_mcode_product_model.mcode_feature_id')
        ->leftJoin('mcode_category_mcode_feature', 'mcode_features.id', '=', 'mcode_category_mcode_feature.mcode_feature_id')
        ->leftJoin('mcode_categories', 'mcode_category_mcode_feature.mcode_category_id', '=', 'mcode_categories.id')
        ->select('mcode_categories.*')
        ->where('mcode_categories.name', '!=','Obsolete')
        ->whereIn('mcode_feature_mcode_product_model.mcode_product_model_id', $productModels)
        ->groupBy('mcode_category_mcode_feature.mcode_category_id')
        ->get();
          //dd($features);

        //$categories = McodeCategory::orderBy('order','ASC')->get();
        $html = view('mcode::site.mcodes.steps.category',compact('categories','mcode'))->render();
        $data['html']=$html;
        
        echo json_encode($data);
    }

    public function getFeature(Request $request)
    {
        $productID=$request->productID;
        $mcode = Mcode::where('id',$productID)->first();
        $productModels=$mcode->models->pluck('id')->toArray();

        $ids=explode(',',$request->ids);
        $keywords=$request->keywords;

        $allCategories = McodeCategory::with('categoriesMcodeFeatures')->orderBy('order','ASC')->get();
        
        $categories = McodeCategory::with(['categoriesMcodeFeatures' => function($query) use ($productModels,$keywords){
            
            $query->join('mcode_feature_mcode_product_model', 'mcode_features.id', '=', 'mcode_feature_mcode_product_model.mcode_feature_id')
            ->whereIn('mcode_feature_mcode_product_model.mcode_product_model_id', $productModels);
        
            if($keywords){
                $query->where('mcode_features.mcode', 'like', '%' . $keywords . '%');
                $query->orWhere('mcode_features.description', 'like', '%' . $keywords . '%');
            }
            $query->groupBy('mcode_features.id');

        }])->whereIn('id',$ids)->orderBy('order','ASC')->get();
          
        $filterCategories = McodeCategory::orderBy('order','ASC')->get();
        
        $html = view('mcode::site.mcodes.steps.feature',compact('categories','filterCategories','mcode'))->render();

        $htmlCategories = view('mcode::site.mcodes.steps.filter-categories',compact('ids','allCategories'))->render();

        
        
        $data['html']=$html;
        $data['htmlCategories']=$htmlCategories;
        
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
        $ids=explode(',',$request->ids);
        $features = McodeFeature::whereIn('id',$ids)->get();
        $checktype = $features->pluck('mcode')->toArray()[0];

        $source_strings = implode(' ', $features->pluck('source_string')->toArray());
        $combined_string = Format::combinedSource($source_strings);
        $html = view('mcode::site.mcodes.steps.generate-modal', compact('features','combined_string','checktype'))->render();
        $data['html']=$html;
        echo json_encode($data);
    }

    public function generatePdf(Request $request){

        $productID=$request->productID;
        $categoryIDs=explode(',',$request->categoryIDs);
        $featureIDs=explode(',',$request->featureIDs);

        $product = Mcode::where('id',$productID)->first();
        $features = McodeFeature::whereIn('id',$featureIDs)->get();

        $checktype = $features->pluck('mcode')->toArray()[0];

        // $categories = McodeCategory::whereIn('id',$categoryIDs)->get();

        $categories = McodeCategory::with(['features' => function($query) use ($featureIDs){

            $query->whereIn('id', $featureIDs);
        
        }])->whereIn('id',$categoryIDs)->get();

    
            $source_strings = implode(' ', $features->pluck('source_string')->toArray());

            // $dd($source_string);

            $combined_string = Format::combinedSource($source_strings);
 

        $config = ['instanceConfigurator' => function($mpdf) {
            
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);

            //ob_start();
 
            // $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
 
            // $mpdf->h2toc = array(
            //     'H1' => 0,             
            // );

            //$mpdf->WriteHTML(ob_get_clean());
        }];
       
        // $data = [
        //     'content' => 'Combined Configuration!'
        // ];

        $pdf = PDF::loadView('mcode::pdf.document', compact('combined_string','checktype' ,'product','features','categories'),[], $config);
        
        $formatted_name = str_replace(' ', '_', $product->name);

        $name=$formatted_name.'_full_config.pdf';

        // return $pdf->stream($name);
        return $pdf->download('document.pdf');

    }

    public function printPdf(Request $request){

        $productID=$request->productID;
        $categoryIDs=explode(',',$request->categoryIDs);
        $featureIDs=explode(',',$request->featureIDs);

        $product = Mcode::where('id',$productID)->first();
        $features = McodeFeature::whereIn('id',$featureIDs)->get();

        $checktype = $features->pluck('mcode')->toArray()[0];

        // $categories = McodeCategory::whereIn('id',$categoryIDs)->get();

        $categories = McodeCategory::with(['features' => function($query) use ($featureIDs){

            $query->whereIn('id', $featureIDs);
        
        }])->whereIn('id',$categoryIDs)->get();

    
            $source_strings = implode(' ', $features->pluck('source_string')->toArray());

            // $dd($source_string);

            $combined_string = Format::combinedSource($source_strings);
 

        $config = ['instanceConfigurator' => function($mpdf) {
            
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);

            //ob_start();
 
            // $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
 
            // $mpdf->h2toc = array(
            //     'H1' => 0,             
            // );

            //$mpdf->WriteHTML(ob_get_clean());
        }];
       
        // $data = [
        //     'content' => 'Combined Configuration!'
        // ];

        $pdf = PDF::loadView('mcode::pdf.document', compact('combined_string','checktype' ,'product','features','categories'),[], $config);
        
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
            //$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            // $mpdf->SetWatermarkText("Paid");
            // $mpdf->showWatermarkText = true;
            // $mpdf->watermark_font = 'DejaVuSansCondensed';
            // $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullwidth');
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);
        

            $mpdf->h2toc = array(
                'H1' => 0,
                'H2' => 1,
                'H3' => 2
            );
 
        }];
       
        // $data = [
        //     'content' => 'Code Configuration Guide!'
        // ];

        $pdf = PDF::loadView('mcode::pdf.single-qr-ducument', compact('product','feature','categories'),[], $config);

        $formatted_name = str_replace(' ', '_', $product->name);

        $name=$formatted_name.'_'.$feature->mcode.'_config.pdf';
        // return $pdf->stream($name);
        return $pdf->download('document.pdf');

    }

    public function printSingledPdf(Request $request){

        $productID=$request->productID;
        $categoryIDs=explode(',',$request->categoryIDs);
        $featureIDs=$request->featureIDs;

        $product = Mcode::where('id',$productID)->first();
        $feature = McodeFeature::where('id',$featureIDs)->first();
        $categories = McodeCategory::whereIn('id',$categoryIDs)->get();



        $config = ['instanceConfigurator' => function($mpdf) {
            //$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            // $mpdf->SetWatermarkText("Paid");
            // $mpdf->showWatermarkText = true;
            // $mpdf->watermark_font = 'DejaVuSansCondensed';
            // $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullwidth');
            $mpdf->SetDocTemplate(public_path('cover.pdf'), false);
        

            $mpdf->h2toc = array(
                'H1' => 0,
                'H2' => 1,
                'H3' => 2
            );
 
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

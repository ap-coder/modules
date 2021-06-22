 
<link rel="stylesheet"  type="application/pdf" href="{{ public_path('print.css') }}" />
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 10px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 10px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
{{-- <htmlpagefrontpage name="cover-page">
<h1>{{ $product->name ?? '' }}</h1>

	@php
        $mcodes=implode(' ',$features->pluck('mcode')->toArray());
        $string = Modules\Mcode\Helpers\Format::combinedSource($mcodes);
    @endphp

</htmlpagefrontpage> --}}

{{-- layout setup documentation here: --}}
{{-- https://mpdf.github.io/what-else-can-i-do/forms.html --}}

<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black; margin-bottom:5rem;font-family: Helvetica;">
		<div style="border-bottom: 1px solid #000000; font-weight: bold;  font-size: 10pt; margin-top:1rem;">
			<img width="100px" src="{{ public_path('site/img/code_logo_300w.png') }}" style="margin-bottom:1rem;">	 
			<div style=" text-align: right; font-family: sans-serif;">
				
			</div>
		</div>
	</div>
</htmlpageheader>

<htmlpagefooter name="page-footer">
	<table width="100%" style="border-bottom: 1px solid #000000;font-family: Helvetica;">
	   <tr>
		   <td width="33%">{DATE jS F Y}</td>
		   <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		   <td width="33%" style="text-align: right; "> {{$product->name ?? ''}}</td>
	   </tr>
   </table>
   <div class="footer" style="margin-top:1rem;">
	
	   <div style="text-align:center; font-size:.5rem;font-family: Helvetica;">
	   Corporate Office<br>
	   434 West Ascension Way Suite 300 Salt Lake City, UT 84123, USA<br>
	   Phone: 801-495-2200 Fax: 801-495-2202<br>
	   Salt Lake City | Boston | Amsterdam
	   </div>
   </div>
</htmlpagefooter>


<div name="cover-page" class="coverpage" style="display:flex; flex:1;font-family: Helvetica;">
	 

	@if($product->photo)
	<div class="full-width">
        <img id="cover-image" src="{{ $product->photo->getUrl() }}" style="float: left;margin-left: -50px;margin-top: 30px;">
	</div>
	@endif
 
	<h1 id="cover-title" class="coverpage-title helvetica" style="font-family: Helvetica;text-align:right;font-size: 48px;margin-top: 145px;">
		{{ $product->name ?? '' }}
	</h1>
 
</div>






<tocpagebreak>



{{-- <div class="coverpage">
	<div class="fullwidth">
    <img src="{{ $product->photo ? $product->photo->getUrl() : '' }}" style="width:90mm;">
	<h1>{{ $product->name ?? '' }}</h1>
	<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ipsam distinctio aliquid qui deleniti commodi reprehenderit amet fugiat delectus. Magni enim quod perspiciatis qui aspernatur optio recusandae animi tenetur labore.</p>
	</div>
</div> --}}



<div class="combinedqr">
	<h1 class="roboto">Combined Configuration</h1>
 

	<div style="text-align: center">
		 
		<div class="full-width">
	       {{--  @if(str_starts_with($feature->mcode, 'M2'))
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	        @else
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        	@endif --}}
		</div>
		 

		 <div class="row feature-list">
	 
		 		 @foreach ($features as $feature)
		 		 <div class="feature">{{ $feature->mcode ?? '' }} <br> {{ $feature->description ?? '' }}</div>
		 		 @endforeach
 
		 </div>
	</div>
<pagebreak>

	<table class="tg" width="100%">
	 
	  @foreach($features->chunk(4) as $section)
	  <tr>
	    @foreach ($section as $feature)
	    <td class="tg-0lax" colspan="1">
	        @if(str_starts_with($feature->mcode, 'M2'))
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	        @else
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
	        @endif

	    	<h2>{{ $feature->mcode ?? '' }}</h2>
	    	<h3>{{ $feature->description ?? '' }}</h3>
	    </td>
	  @endforeach
	  </tr>
	  @endforeach
	 
	</table>


{{-- @foreach($features->chunk(3) as $section) --}}
{{-- @foreach($section as $news) --}}
  
{{-- @foreach($features->chunk(3) as $section) 
<div class="flex-container">
	@foreach ($section as $feature)
   	<div class="flex-items">
        @if(str_starts_with($feature->mcode, 'M2'))
          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
        @else
          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        @endif
   		<h2>{{ $feature->mcode ?? '' }}</h2>
    	<h3>{{ $feature->description ?? '' }}</h3>
   	</div>
   	@endforeach
</div>
@endforeach --}}

 
		
 </div>
  </div>

</div>
 
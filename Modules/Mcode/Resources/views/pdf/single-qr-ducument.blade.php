 
<link rel="stylesheet"  type="application/pdf" href="{{ public_path('print.css') }}" />


 

 
<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black; margin-bottom:5rem;">
		<div style="border-bottom: 1px solid #000000; font-weight: bold;  font-size: 10pt; margin-top:1rem;">
			<img width="100px" src="{{ public_path('site/img/code_logo_300w.png') }}" style="margin-bottom:1rem;">	 
			<div style=" text-align: right; font-family: sans-serif;">
				
			</div>
		</div>
	</div>
</htmlpageheader>

<htmlpagefooter name="page-footer">
	<table width="100%" style="border-bottom: 1px solid #000000;">
	   <tr>
		   <td width="33%">{DATE jS F Y}</td>
		   <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		   <td width="33%" style="text-align: right; "> {{$product->name ?? ''}}</td>
	   </tr>
   </table>
   <div class="footer" style="margin-top:1rem;">
	
	   <div style="text-align:center; font-size:.5rem;">
	   Corporate Office<br>
	   434 West Ascension Way Suite 300 Salt Lake City, UT 84123, USA<br>
	   Phone: 801-495-2200 Fax: 801-495-2202<br>
	   Salt Lake City | Boston | Amsterdam
	   </div>
   </div>
</htmlpagefooter>





<div name="cover-page" class="coverpage" style="display:flex; flex:1;">
	 

	@if($product->photo)
	<div class="full-width">
        <img id="cover-image" src="{{ $product->photo->getUrl() }}" style="float: left;margin-left: -50px;margin-top: 30px;">
	</div>
	@endif
 





	<h1 id="cover-title" class="coverpage-title" style="text-align:right;font-size: 48px;margin-top: 145px;">
		{{ $product->name ?? '' }}
	</h1>
 
</div>

<div class="singleqr letter" name="single-qr" style="text-align:center;display: flex;">
	
	<h1 class="" style="width: 100%;margin-bottom:50mm;">
		{{ $product->name ?? '' }} Single Feature
	</h1>

	@if(str_starts_with($feature->mcode, 'M2'))
	<img class="img-fluid" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($feature->formatted_source_string)) !!} ">
	{{-- {!! DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE') !!} --}}
	{{ $feature->mcode ?? '' }}
	@else
	{{-- {!! dd($feature->formatted_source_string) !!} --}}
	 
 	<?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('4', 'DATAMATRIX',33,33) . '" alt="barcode"   />'; ?>
	<br />
	<h2>{{ $feature->mcode ?? '' }}</h2>
	<h3>{{ $feature->description ?? '' }}</h3>
	@endif


</div>


{{-- <div class="coverpage">
	<div class="fullwidth">
		<img src="{{ $product->photo ? $product->photo->getUrl() : '' }}" style="width:90mm;">
	<h1>cover-page</h1>
	<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ipsam distinctio aliquid qui deleniti commodi reprehenderit amet fugiat delectus. Magni enim quod perspiciatis qui aspernatur optio recusandae animi tenetur labore.</p>
	</div>
</div> --}}


{{-- <pagebreak />
<div class="letter">Dear Sir or Madam,<br />
Contents of your letter...
<pagebreak />
... more letter on page 2 ...
<pagebreak />
... more letter on page 3 ...
</div> --}}

{{-- <div class="noheader" name="noheader">
	<h1>noheader</h1>
	<p class="grid-template-columns">Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Corrupti exercitationem provident ad aspernatur, nulla, corporis quos laboriosam, dolor dolore blanditiis facere, recusandae. Quisquam quas optio obcaecati perspiciatis nihil, exercitationem harum!</p>
 
</div> --}}

{{--  <div style="position: absolute; top: 50mm; left: 50mm; width: 100mm;"> This is text in a fixed position block element. </div> --}}

{{-- 
<p>Introduction: Here starts the document</p>

<div style="position: absolute; top: 50mm; left: 50mm; width: 100mm;"> This is text in a fixed position block element. </div>  --}}

{{-- <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
    <img src="{{ public_path('site/files/images/frontcover.jpg') }}"  style="width: 210mm; height: 297mm; margin: 0;" />
</div> --}}
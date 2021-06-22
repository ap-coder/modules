 
<link rel="stylesheet"  type="application/pdf" href="{{ public_path('print.css') }}" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
 
<style>
/*	 div { border: 1px solid black; padding: 1em; }
    .level1 { box-decoration-break: slice; }
    .level2 { box-decoration-break: clone; }
    .level3 { box-decoration-break: clone; }*/
</style>
 
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
	<table width="100%" style="font-family: Helvetica;border-bottom: 1px solid #000000;">
	   <tr>
		   <td width="33%">{DATE jS F Y}</td>
		   <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		   <td width="33%" style="text-align: right; "> {{$product->name ?? ''}}</td>
	   </tr>
   </table>
   <div class="footer" style="margin-top:1rem;font-family: Helvetica;">
	
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
 
	<h1 id="cover-title" class="coverpage-title helvetica" style="text-align:right;font-size: 48px;margin-top: 145px; font-weight: bold;font-family: Helvetica;">
		{{ $product->name ?? '' }}
	</h1>
 
</div> 



 

<div class="singleqr letter" name="single-qr" style="text-align:center;display: flex; font-family: Helvetica;">
	
	<h1 class="helvetica" style="width: 100%;margin-bottom:50mm;font-family: Helvetica!important;font-weight: bold;">
		{{ $product->name ?? '' }} Single Feature
	</h1>

 


        @if(str_starts_with($feature->mcode, 'M2'))
          <?php echo '<img width="200px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
        @else
          <?php echo '<img width="150px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        @endif
 
 
	<br />
	<h2>{{ $feature->mcode ?? '' }}</h2>
	<h3>{{ $feature->description ?? '' }}</h3>
 
 
 

</div>
 
<html>
<head>

	<link rel="stylesheet"  type="application/pdf" href="{{ public_path('combined-print.css') }}" />
	<style type="text/css">

@page { 
		size: auto;
		header: page-header;
		footer: page-footer;
 		size: 8.5in 11in; 
		sheet-size: Letter;
        font-family: Helvetica;
        page-break-before: right;

}

@page page-noheader {
   		header: _blank;
        footer: _blank;
        size: 8.5in 11in;
		sheet-size: Letter;
        font-family: Helvetica;
        /*page-break-after: right;*/
}
 
@page page-intro {
        size: 8.5in 11in;
		sheet-size: Letter;
		margin-top: 2.5cm;
        font-family: Helvetica;
        /*page-break-before: right;*/
}

@page page-combinedqr {
        size: 8.5in 11in;
		sheet-size: Letter;
		header: page-header;
		footer: page-footer;
		margin-header: 5mm; 
        font-family: Helvetica;
        /*page-break-before: right;     */
}

@page page-cqrl {
        size: 8.5in 11in;
		sheet-size: Letter;
		header: page-header;
		footer: page-footer;		
		/*margin-top: 3cm;*/
		margin-header: 5mm; 
        font-family: Helvetica;
        /*page-break-before: right;*/
}

 
div.coverpage {
    page: page-noheader;
}

div.intro-page{
	page: page-intro;
	page-break-before: right;
}

div.combined-qr{
	page: page-combinedqr;
	page-break-before: right;
}

div.combined-qr-list {
	page: page-cqrl;
	page-break-before: right;
}


	</style>
</head>
<body>
 

<!--mpdf

<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black; margin-bottom:5rem;font-family: Helvetica;">
		<div style="border-bottom: 1px solid #000000; font-weight: bold;  font-size: 10pt; margin-top:1rem;">
			<img width="100px" src="{{ public_path('site/img/code_logo_300w.png') }}" style="margin-bottom:1rem;">	 
			<span style="width: 50pix; text-align: right; font-family: sans-serif;">
				{{-- {PAGENO} --}}
			</span>
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

mpdf-->

<div name="page-cover" class="coverpage" style="font-family: Helvetica;">
	 
	<bookmark content="Configuration Guide" />
	@if($product->photo)
	<div class="full-width">
        <img id="cover-image" src="{{ $product->photo->getUrl() }}" style="float: left;margin-left: -50px;margin-top: 30px;">
	</div>
	@endif
 
	<h1 id="cover-title" class="coverpage-title helvetica" style=" font-weight: bold;font-family: Helvetica; text-align:right;font-size: 48px;margin-top: 145px; color:ghostwhite;">
		{{ $product->name ?? '' }}<tocentry level="0" content="{{ $product->name ?? '' }} Configuration Guide" />
	</h1>
 
</div>


 <pagebreak sheet-size="Letter" />

 
<div name="page-intro" class="intro-page">
 <bookmark content="Welcome Guide" />
	<h2 style="text-align:center;">Welcome To Your Configuration Guide<tocentry content="Welcome To Your Configuration Guide" level="2" /></h2>
	
	<div class="bubble" style="border:3px dotted firebrick;width:60%;margin: 5em auto 0;padding:2rem;"><tocentry level="3" content="Welcome message and instructions" /><bookmark content="Welcome message & instructions" />
		Thank you for using our MCode Configuration Generator for your devices. We are continually working to improve our scanner capabilities and software. It is possible that these codes could change or be adjusted over time. If, for some reason, the customized configuration code that you have created does not work the way you anticipate, please try scanning the individual codes on the following pages or contact our customer support team. They will be happy to assist with you with any issues you may be experiencing.
	</div>

	<h3 style="margin-top:2em;text-align: center;">You Can Reach Us Anytime At</h3>
	<bookmark content="Contact Details" />
	<h2 style="text-align: center;"><a href="https://codecorp.com/contact">https://codecorp.com/contact</a><tocentry level="3" content="Website Address" /></h2>
 	<h2 style="text-align: center;"><a href="tel:18014952200">(801) 495-2200</a><tocentry level="3" content="Contact Number" /></h2>
 	<h2 style="text-align: center;"><a href="mail:support@codecorp.com">Support@CodeCorp.com</a><tocentry level="3" content="Company Email" /></h2>

	{{-- <span style="outline-width:thin; outline-color:red;">testing </span> --}}

  
</div>

{{-- <pagebreak sheet-size="Letter" /> --}}

{{-- <pagebreak page-break-type="slice" /> --}}



<div name="page-combinedqr" class="combined-qr">
	<bookmark content="Combined Configuration QR">
	<h2 class="helvetica center" style="text-align:center;">Combined Configuration QR </h2>

	<tocentry content="Combined QR for installing all your features at once." level="1"  />

	<p style="text-align:center;color:firebrick;">Scan this code to configure all the functions at once from what you selected in our generator.</p>

 		<div class="main-generated-qr" style="border:1px solid firebrick;width:60%;padding:2rem;min-height:30%;margin: 1em auto;">
			<tocentry content="Combined QR" level="2" /><bookmark content="Combined QR" />
	       @if(str_starts_with($checktype, 'M2'))
	          <?php echo '<img width="150px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	        @else
	          <?php echo '<img width="150px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        	@endif

		</div>
	
 
		<div class="row feature-list" style="height: 50%;">
	 		<tocentry content="List of features within the Combined QR" level="2" />
	 		<bookmark content="Combined QR Features" />
	 			@foreach($categories as $category)
					<strong style="padding: 2mm 0;">{{ $category->name ?? '' }}</strong>
			 		@foreach ($category->features as $feature)
			 		 	<div class="feature" style="word-wrap: break-word;">
			 		 		<strong>{{ $feature->mcode ?? '' }}</strong> <small>{{ $feature->description ?? '' }}</small>  
			 		 	</div>
			 		@endforeach
			 	@endforeach
		</div>
 

 
</div>
<pagebreak page-break-type="slice" /> 














<bookmark content="Individual QR's" />
<h2 style="text-align:center;">List of QR's for Individual Features.<tocentry content="List of QR's for Individual Features." level="1" /></h2>


<div name="combined-qr-list" class="container">
	{{-- <pagebreak sheet-size="Letter" /> --}}
   	@foreach($categories as $category)
   		
		<h2 style="border-bottom:solid 1px gainsboro; margin:0 auto;padding:1em 0;">{{ $category->name ?? '' }}</h2>
    	<bookmark content="{{ $category->name ?? '' }}" />
    	<tocentry content="{{ $category->name ?? '' }}"  level="2" /> 
  		
	     @foreach ($category->features as $feature)

	      <div class="feature" style="page-break:avoid !important;text-align:center; float: left; margin:  0;padding:3mm 0;width: 33%;">
	      
	      	<tocentry content="3 {{ $feature->mcode ?? '' }}: {{ $feature->description ?? '' }}" level="3"  />
	      	<strong >{{ $feature->mcode ?? '' }}<tocentry content="2 MCODE: {{ $feature->mcode ?? '' }}" level="2" /></strong> <br>
	      	<div class="qr-image" style="text-align:center;margin: 2mm 0;">
	          @if(str_starts_with($feature->mcode, 'M2'))
	            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	          @else
	            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
	          @endif
	        </div> <br>
	        
	        <small>{{ $feature->description ?? '' }}<tocentry content="3 {{ $feature->description ?? '' }}" level="3" /></small>
	 	</div>
	    @endforeach
	    <div style="clear: both; margin: 0pt; padding: 0pt; "></div>


 	
    @endforeach


</div>

    

{{-- <tocpagebreak paging="on" links="on" /> --}}
   
</body>
</html>
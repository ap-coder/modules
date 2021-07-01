<html>
<head>

	{{-- <link rel="stylesheet"  type="application/pdf" href="{{ public_path('combined-print.css') }}" /> --}}
	<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
	.tg td{ overflow:hidden;padding:10px 10px;word-break:normal;}
	.tg th{ overflow:hidden;padding:10px 10px;word-break:normal;}
	.tg .tg-0lax{text-align:left;vertical-align:top}

	.other {border:1px solid #888888; width: 40mm; margin-bottom: 1em;} 
	div.mpdf_toc {font-family: Helvetica; font-size: 11pt; } 
	a.mpdf_toc_a,   {}
	a {color: #000066; text-decoration: none; }

	div.mpdf_toc_level_0 {line-height: 1.5; margin-left: 0; padding: 0 2em; }
	span.mpdf_toc_t_level_0 {color: darkred; font-weight: bold; }
	span.mpdf_toc_p_level_0 {}

	div.mpdf_toc_level_1 {/*margin-left: 2em; text-indent: -2em;*/ padding: 0 2em; }
	span.mpdf_toc_t_level_1 {color: darkred; font-weight: bold; }
	span.mpdf_toc_p_level_1  {}

	div.mpdf_toc_level_2 {/*margin-left: 4em; text-indent: -4em;*/ padding: 0 2em; }
	span.mpdf_toc_t_level_2 {font-weight: bold; }
	span.mpdf_toc_p_level_2  {}

	div.mpdf_toc_level_3 {/*margin-left: 6em; text-indent: -6em;*/ padding: 0 2em; }
	span.mpdf_toc_t_level_3 {font-style: italic;  }
	span.mpdf_toc_p_level_3  {}

	div.mpdf_toc_level_4 {/*margin-left: 8em; text-indent: -8em; */padding: 0 2em; }
	span.mpdf_toc_t_level_4 {font-style: italic;  }
	span.mpdf_toc_p_level_4  {}

	div.mpdf_toc_level_5 {/*margin-left: 10em; text-indent: -10em;*/ padding: 0 2em; }
	span.mpdf_toc_t_level_5 {font-style: italic; /*font-weight: bold;*/ color:deeppink ; }
	span.mpdf_toc_p_level_5  {}

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

<div name="page-cover" class="coverpage" style="display:flex; flex:1;font-family: Helvetica;">
	 
<bookmark content="Configuration Guide" />
	{{-- @if($product->photo)
	<div class="full-width">
        <img id="cover-image" src="{{ $product->photo->getUrl() }}" style="float: left;margin-left: -50px;margin-top: 30px;">
	</div>
	@endif --}}
 
	<h1 id="cover-title" class="coverpage-title helvetica" style=" font-weight: bold;font-family: Helvetica; text-align:right;font-size: 48px;margin-top: 145px; color:ghostwhite;">
		{{ $product->name ?? '' }}<tocentry level="0" content="{{ $product->name ?? '' }} Configuration Guide" />
	</h1>
 
</div>

{{-- <pagebreak orientation="portrait" type="NEXT-ODD" margin-left="40mm" margin-right="20mm" odd-header-name="myHeader1" odd-header-value="1" even-header-name="myHeader1Even" even-header-value="1" odd-footer-name="myFooter1" odd-footer-value="1" even-footer-name="myFooter1Even" even-footer-value="1" suppress="off" /> --}}

<div name="page-intro" class="intro-page" style="page-break:avoid !important;">
 <bookmark content="Welcome Guide" />
	<h2 style="text-align:center;">Welcome To Your Configuration Guide<tocentry content="Welcome To Your Configuration Guide" level="2" /></h2>
	
	<div class="bubble" style="border:3px dotted firebrick;width:60%;margin: 5em auto 0;padding:2rem;"><tocentry level="3" content="Welcome message and instructions" /><bookmark content="Welcome message & instructions" />
		Thank you for using our MCode Configuration Generator for your devices. We are continually working to improve our scanner capabilities and software. It is possible that these codes could change or be adjusted over time. If, for some reason, the customized configuration code that you have created does not work the way you anticipate, please try scanning the individual codes on the following pages or contact our customer support team. They will be happy to assist with you with any issues you may be experiencing.
		{{-- <h3 style="text-align: justify;">To use the configurations simply print or open the pdf on your pc or mobile and scan the QR with you scanner. Thats all all you need to do. If you here one beep followed by anohter it was successful. If you hear multiple beeps it means the code was not compatable and you might need to regerate your config guide.</h3>
		<h4 style="font-style: italic;color:deeppink ;text-align: justify;"><i>Thanks for using our configuration software; We would like to let you know that while these QR's are in the generator, they might change or be adjusted over time as we are constantly adding to our scanners and this software. If, for some reason, your combined QR that holds all the options you selected does not work the way you anticipate, please try the individual code on the following pages of this pdf or contact our support team. They would love to help you with any issues you are having.</i> </h4> --}}
	</div>

	<h3 style="margin-top:2em;text-align: center;">You can reach us anytime at </h3>
	<bookmark content="Contact Details" />
	<h2 style="text-align: center;"><a href="https://codecorp.com/contact">https://codecorp.com/contact</a><tocentry level="3" content="Website Address" /></h2>
 	<h2 style="text-align: center;"><a href="tel:18014952200">(801) 495-2200</a><tocentry level="3" content="Contact Number" /></h2>
 	<h2 style="text-align: center;"><a href="mail:support@codecorp.com">Support@CodeCorp.com</a><tocentry level="3" content="Company Email" /></h2>

	{{-- <span style="outline-width:thin; outline-color:red;">testing </span> --}}

  
</div>

 

 
<tocpagebreak paging="on" links="on" />
<bookmark content="Table Of Contents" />
<tocentry content="Table Of Contents" level="1" />
 

<div name="page-cqr" class="combined-qr">
	<bookmark content="Combined Configuration QR">
	<h2 class="helvetica center" style="text-align:center;">Combined Configuration QR </h2>

	<tocentry content="Combined QR for installing all your features at once." level="1"  />

	<p style="text-align:center;color:firebrick;">Scan this code to configure all the functions at once from what you selected in our generator.</p>

	<div style="text-align: center">
		<div class="main-generated-qr" style="border:1px solid firebrick;width:60%;margin: 10em auto 1em;padding:2rem;min-height:30%;">
			<tocentry content="Combined QR" level="2" /><bookmark content="Combined QR" />
	       @if(str_starts_with($checktype, 'M2'))
	          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	        @else
	          <?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        	@endif

		</div>
 
		<columns column-count="2" vAlign="J" column-gap="7">
		 	<div class="row feature-list" style="height: 50%;">
		 		<tocentry content="List of features within the Combined QR" level="2" />
		 		<bookmark content="Combined QR Features" />
		 			@foreach($categories as $category)
						<strong style="border-bottom:solid 1px gainsboro;">{{ $category->name ?? '' }}</strong>
				 		@foreach ($category->features as $feature)
				 		 	<div class="feature" style="word-wrap: break-word;">
				 		 		<strong>{{ $feature->mcode ?? '' }}</strong> <small>{{ $feature->description ?? '' }}</small>  
				 		 	</div>
				 		@endforeach
				 	@endforeach
			</div>
		</columns>

	</div>

</div>


<pagebreak page-break-type="slice" />

 	 

	<bookmark content="Individual QR's" />
 	<h2 style="text-align:center;">List of QR's for Individual Features.
 		<tocentry content="List of QR's for Individual Features." level="1" /></h2>
 	<div style="clear:both"></div>

 <columns column-count="5" vAlign="J" column-gap="7">

   @foreach($categories as $category)
   <div class="column">
		<strong style="border-bottom:solid 1px gainsboro;">{{ $category->name ?? '' }}</strong>
    
    	<tocentry content="{{ $category->name ?? '' }}"  level="2"  /> 
  		
	     @foreach ($category->features as $feature)
	      
	      
	      	{{-- <tocentry content="3 {{ $feature->mcode ?? '' }}: {{ $feature->description ?? '' }}" level="3"  /> --}}
	      	<strong>{{ $feature->mcode ?? '' }}<tocentry content="2 MCODE: {{ $feature->mcode ?? '' }}" level="2" /></strong> <br>
	      	<div class="qr-image" style="text-align:center;margin-bottom: 4mm;">
	          @if(str_starts_with($feature->mcode, 'M2'))
	            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	          @else
	            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
	          @endif
	        </div> <br>
	        
	        <small>{{ $feature->description ?? '' }}<tocentry content="3 {{ $feature->description ?? '' }}" level="3" /></small>
	 
	    @endforeach
 	</div>
    @endforeach
   
</body>
</html>
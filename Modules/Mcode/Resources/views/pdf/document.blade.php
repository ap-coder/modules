<html>
<head>

	<link rel="stylesheet"  type="application/pdf" href="{{ public_path('combined-print.css') }}" />
	<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
	.tg td{ overflow:hidden;padding:10px 10px;word-break:normal;}
	.tg th{ overflow:hidden;padding:10px 10px;word-break:normal;}
	.tg .tg-0lax{text-align:left;vertical-align:top}
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
	 

	@if($product->photo)
	<div class="full-width">
        <img id="cover-image" src="{{ $product->photo->getUrl() }}" style="float: left;margin-left: -50px;margin-top: 30px;">
	</div>
	@endif
 
	<h1 id="cover-title" class="coverpage-title helvetica" style=" font-weight: bold;font-family: Helvetica; text-align:right;font-size: 48px;margin-top: 145px; color:ghostwhite;">
		{{ $product->name ?? '' }}
	</h1>
 
</div>

{{-- <pagebreak orientation="portrait" type="NEXT-ODD" margin-left="40mm" margin-right="20mm" odd-header-name="myHeader1" odd-header-value="1" even-header-name="myHeader1Even" even-header-value="1" odd-footer-name="myFooter1" odd-footer-value="1" even-footer-name="myFooter1Even" even-footer-value="1" suppress="off" /> --}}

<div name="page-intro" class="intro-page" style="page-break:avoid !important;">
 
	<h1 style="text-align:center;">Welcome To Your Configuration Guide</h1>
	<tocentry level="2" content="Welcome message and instructions" />
	<div class="bubble" style="border:3px dotted firebrick;width:60%;margin: 5em auto 0;padding:2rem;">
		<h3>To use the configurations simply print or open the pdf on your pc or mobile and scan the QR with you scanner. Thats all all you need to do. If you here one beep followed by anohter it was successful. If you hear multiple beeps it means the code was not compatable and you might need to regerate your config guide.</h3>
		<h4 style="color:cornflowerblue;"><i>Thanks for using our configuration software; We would like to let you know that while these QR's are in the generator, they might change or be adjusted over time as we are constantly adding to our scanners and this software. If, for some reason, your combined QR that holds all the options you selected does not work the way you anticipate, please try the individual code on the following pages of this pdf or contact our support team. They would love to help you with any issues you are having.</i> </h4>
	</div>

	<h3 style="margin-top:10em;text-align: center;">You can reach us anytime at <a href="https://codecorp.com/contact">https://codecorp.com/contact</a></h3>
 
	{{-- <span style="outline-width:thin; outline-color:red;">testing </span> --}}

  
</div>



<div name="page-toc" class="toc-page" style="page-break:avoid !important;">
	<tocpagebreak paging="on" links="on" />
		{{-- <tocpagebreak paging="on" links="on" resetpagenum="3" page-break-type="slice" /> --}}
 
		<bookmark content="Table Of Contents" level="0" />
		<tocentry content="Table Of Contents" level="0" />
 
</div>
 

<div name="page-cqr" class="combined-qr">
	<h1 class="helvetica center">Combined Configuration QR</h1>
	<tocentry level="2" content="QR for installing all your features at once." />
	<p>Scan this code to configure all the functions at once from what you selected in our generator.</p>
	<div style="text-align: center">
		<div class="main-generated-qr" style="border:1px solid firebrick;width:60%;margin: 12em auto 0;padding:2rem;min-height:30%;">
	        @if (str_starts_with($combined_string, '%01X')) 
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
	        @else
	          <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($combined_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
        	@endif

		</div>
			{{-- <columns column-count="n" vAlign="justify" column-gap="n" /> --}}
			<columns column-count="2" vAlign="J" column-gap="7">
			<tocentry level="2" content="All selected features in combined QR." />
		 	<div class="row feature-list" style="height: 50%;">
		 		 @foreach ($features as $feature)
		 		 	<div class="feature" style="border-bottom:solid 1px gainsboro;word-wrap: break-word; padding: 0 .5em;">
		 		 		<strong>{{ $feature->mcode ?? '' }}</strong> <small>{{ $feature->description ?? '' }}</small>  
		 		 	</div>
		 		 @endforeach
		 </div>
		</columns>
	</div>
</div>


<pagebreak page-break-type="slice" />

 	 
<columns column-count="1" vAlign="J" column-gap="5" />
 <tocentry content="Individual Funtions QR's" />

  <table class="tg" width="100%">
   
    {{-- @foreach($features->chunk(4) as $section) --}}
    <tr>
      @foreach ($features as $feature)
      <td class="tg-0lax" style="text-align:center;">
      	<div class="qr-image" style="text-align:center;margin-bottom: 4mm;">
          @if(str_starts_with($feature->mcode, 'M2'))
            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'QRCODE',10,10) . '" alt="barcode"   />'; ?>
          @else
            <?php echo '<img width="100px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($feature->formatted_source_string, 'DATAMATRIX',10,10) . '" alt="barcode"   />'; ?>
          @endif
        </div> <br>
 
        <strong>{{ $feature->mcode ?? '' }}</strong> <br>
        <small>{{ $feature->description ?? '' }}</small>
        <tocentry level="2" content="{{ $feature->mcode ?? '' }}: {{ $feature->description ?? '' }}" />
      </td>
    @endforeach
    </tr>
    {{-- @endforeach --}}
   
  </table>
</body>
</html>
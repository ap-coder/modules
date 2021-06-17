 
<link rel="stylesheet"  type="application/pdf" href="{{ asset('print.css') }}" />

<htmlpagefrontpage name="cover-page">
<h1>{{ $product->name ?? '' }}</h1>

	@php
        $mcodes=implode(' ',$features->pluck('mcode')->toArray());
        $string = Modules\Mcode\Helpers\Format::combinedSource($mcodes);
    @endphp



</htmlpagefrontpage>


layout setup documentation here:
https://mpdf.github.io/what-else-can-i-do/forms.html


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


<div class="coverpage">
	<div class="fullwidth">
    <img src="{{ $product->photo->getUrl() ?? '' }}" style="width:90mm;">
	<h1>cover-page</h1>
	<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam ipsam distinctio aliquid qui deleniti commodi reprehenderit amet fugiat delectus. Magni enim quod perspiciatis qui aspernatur optio recusandae animi tenetur labore.</p>
	</div>
</div>

<div class="combinedqr">
	<h1>Combined Configurations</h1>
	<table>
		<tr>
			<td>{{ $data['content'] }}</td>
		</tr>
	</table>

	<div style="text-align: center">
	    <img class="img-fluid" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($string)) !!} ">
	</div>
	<div class="2-columns">
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, odio, sequi! Ducimus error voluptate nihil libero voluptatem, commodi id nesciunt ipsam odit aperiam quos praesentium, vitae. Dicta, voluptate repudiandae quaerat.
	</div>


	<table>
		@foreach ($features as $feature)
		<tr>
			<td>{{ $feature->description ?? '' }} <br> <span>{{ $feature->mcode ?? '' }}</span></td>
		</tr>
		@endforeach
	</table>

	<table>
		@foreach ($features as $feature)
		<tr>
			<td>
				<img class="img-fluid" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($feature->description)) !!} ">
				</td>
		</tr>
		<tr>
			<td>{{ $feature->description ?? '' }} <br> <span>{{ $feature->mcode ?? '' }}</span></td>
		</tr>
		@endforeach
	</table>
  

</div>


<div class="page-toc">
	<h1>page-toc</h1>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, voluptate ipsum laudantium nesciunt repellendus deleniti vel officiis, praesentium similique voluptatibus? Veniam fugiat, quisquam neque, maiores soluta ab vel sit? Aliquid.</p>
</div>
 
<div class="noheader">
	<h1>noheader</h1>
	<p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Corrupti exercitationem provident ad aspernatur, nulla, corporis quos laboriosam, dolor dolore blanditiis facere, recusandae. Quisquam quas optio obcaecati perspiciatis nihil, exercitationem harum!</p>
</div>

<div class="myfixed">

	{{-- <columns column-count="n" vAlign="justify" column-gap="n" /> --}}
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec mattis lacus ac purus feugiat semper. Donec aliquet nunc odio, vitae pellentesque diam. Pellentesque sed velit lacus. Duis quis dui quis sem consectetur sollicitudin. Cras dolor quam, dapibus et pretium sit amet, elementum vel arcu. 
</div>


{{-- <div style="position: fixed; right: 0mm; bottom: 0mm; rotate: -90;">
    <barcode code="" class="barcode" />
</div> --}}

 <p>Introduction: Here starts the document</p>

 <div style="position: absolute; top: 50mm; left: 50mm; width: 100mm;"> This is text in a fixed position block element. </div> 

<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
    <img src="/files/images/frontcover.jpg" 
         style="width: 210mm; height: 297mm; margin: 0;" />
</div>
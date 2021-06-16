<style>
	@page {
		header:page-header;
		footer: page-footer;
		/*margin: 2mm;	 */
	}
</style>
<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black;">
		<img width="100px" src="{{ public_path('site/img/code_logo_300w.png') }}" style="">
		<div style=" text-align: right; font-family: sans-serif;">
			{DATE jS F Y}
		</div>
	</div>
</htmlpageheader>

<htmlpagecontent name="page-content">
	<div class="header-space">&nbsp;</div>
	
	<h1>{{ $product->name ?? '' }}</h1>
	<table>
		<tr>
			<td>{{ $data['content'] }}</td>
		</tr>
	</table>

	@php
            $mcodes=implode(' ',$features->pluck('mcode')->toArray());
            $string = Modules\Mcode\Helpers\Format::combinedSource($mcodes);
        @endphp

        <img class="img-fluid" src="data:image/png;base64, {!! base64_encode(QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->format('png')->size(300)->generate($string)) !!} ">

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
		<img class="img-fluid" src="data:image/png;base64, {!! base64_encode(QrCode::eyeColor(0, 204,0,0, 204,0,0 )->eyeColor(2, 204,0,0, 0,0,0 )->eyeColor(1, 204,0,0, 0,0,0 )->format('png')->size(150)->generate($feature->description)) !!} ">
		</td>
</tr>
	@endforeach
</table>
</htmlpagecontent>

<htmlpagefooter name="page-footer">
	<div class="footer">
	 
		<div style="text-align:center; font-size:.5rem; margin-bottom;">
		Corporate Office<br>
		434 West Ascension Way Suite 300 Salt Lake City, UT 84123, USA<br>
		Phone: 801-495-2200 Fax: 801-495-2202<br>
		Salt Lake City | Boston | Amsterdam
		</div>
	</div>
	</htmlpagefooter>

 
 

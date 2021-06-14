<style>
	@page {
		header:page-header;
		footer: page-footer;
		/*margin: 2mm;	 */
	}

 
  
  
</style>
 
<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black;">
		<img width="100px" src="{{ asset('site/img/code_logo_300w.png') }}" style=""> 
			<div style=" text-align: right; font-family: sans-serif;">
		        {DATE jS F Y}
		    </div>
	</div>

</htmlpageheader>
<htmlpagecontent name="page-content">
	<div class="header-space">&nbsp;</div>
<h2 class="text-center">{{ $data['title'] }}</h2>



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


 
 

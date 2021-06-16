 
{{-- <link rel="stylesheet"  type="application/pdf" href="{{ asset('print.css') }}" /> --}}
<htmlfrontpage name="cover-page">

 

 <h1>COVER PAGE HERE</h1>
<div>Here is the text of the first chapter</div>
    <div class="chapter2">Text of Chapter 2</div>

    <div class="noheader">No-Header page</div>

<tocpagebreak toc-odd-header-name='html_MyTOCHeader' toc-odd-header-value=\"1\"  />
</htmlfrontpage>
<pagebreak />



<htmlpageheader name="page-header">
	<div class="header" style="border-bottom:1px solid black;">
		<div style="border-bottom: 1px solid #000000; font-weight: bold;  font-size: 10pt;">
			<img width="100px" src="{{ public_path('site/img/code_logo_300w.png') }}" style="">	 
			<div style=" text-align: right; font-family: sans-serif;">
				{DATE jS F Y}
			</div>
		</div>
	</div>
</htmlpageheader>
 

<htmlpagecontent name="page-content">
	
</htmlpagecontent>

 
<htmlpagefooter name="page-footer">
	 <table width="100%" style="border-bottom: 1px solid #000000;">
        <tr>
            <td width="33%">{DATE  m-j-Y}</td>
            <td width="33%" align="center">{PAGENO}/{nbpg}</td>
            <td width="33%" style="text-align: right; ">My document</td>
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

 
 

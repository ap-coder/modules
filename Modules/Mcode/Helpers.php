<?php

namespace Modules\Mcode {


	// if(!function_exists('code_custom'))
	// {
	
	// 	function code_custom($name, $path = ''):string
	// 	{
	// 		$module = app('modules')->find($name);
	
	// 		return $module->getPath(). ($path ? DIRECTORY_SEPARATOR . $path : $path);
	// 	}
	// }
	
	function format_select_source($request){
		$string =  $request;
		
		$header = chr(1).'Y'.chr(29).chr(2);
		$pipe = chr(3);
		$footer = chr(3) . chr(4);
		
		$string = trim(preg_replace('/\s\s+/', $pipe, $string));
		$string = str_replace(' ', $pipe, $string);
		// dd($header . $str . $footer);
		$select_source = $header . $string . $footer;
		
		return $select_source;
	
	}
}

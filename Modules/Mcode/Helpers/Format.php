<?php

namespace Modules\Mcode\Helpers;

class Format
{
	public static function combinedSource (Request $request)
	{
		$header = chr(1).'Y'.chr(29).chr(2);
		$pipe = chr(3);
		$footer = chr(3) . chr(4);
		
		$request = str_replace(', ', ',', $request);
		$request = trim(preg_replace('/\s\s+/', $pipe, $request));
		$source_string = str_replace(' ', $pipe, $request);

		
		$source_string = $header . $source_string . $footer;
		
		return $source_string;
		
	}
}
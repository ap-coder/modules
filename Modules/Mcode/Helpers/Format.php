<?php

namespace Modules\Mcode\Helpers;

class Format
{
	public static function combinedSource (string $string)
	{
		$header = chr(1).'Y'.chr(29).chr(2);
		$pipe = chr(3);
		$footer = chr(3) . chr(4);
		
		$string = str_replace(', ', ',', $string);
		$string = trim(preg_replace('/\s\s+/', $pipe, $string));
		$source_string = str_replace(' ', $pipe, $string);

		
		$source_string = $header . $source_string . $footer;
		
		return $source_string;		
	}
}
<?php

namespace Modules\Mcode\Helpers;
use Illuminate\Support\Facades\Log;

class Format
{
	public static function combinedSource (string $string)
	{
   		if (str_starts_with($string, '%01X%1d%02')) {

            Log::info("M1 CODE SCANNED");
            
            /* M1 CODES */
            $header = chr(1).'X'.chr(29).chr(2);
             
            $footer = chr(4);
            
            // $string = str_replace(', ', ',', $string);

            $string = trim(preg_replace('/\s\s+/', $pipe, $string));
            // $string = str_replace(' ', $pipe, $string);
            $string = str_replace('%01X%1d%02', $header, $string);
            $string = str_replace('%04', $footer, $string);
     
            $source_string = $string;
            
            return $source_string;

        }else{

            Log::info("M1 CODE SCANNED");

            /* M2 CODES */
            $header = chr(1).'Y'.chr(29).chr(2);
            $pipe = chr(3);
            $footer = chr(3) . chr(4);
            
            $string = trim(preg_replace('/\s\s+/', $pipe, $string));
            $string = str_replace(' ', $pipe, $string);
     
            $source_string = $header . $string. $footer;
            
            return $source_string;
       
       }


		
		// $header = chr(1).'Y'.chr(29).chr(2);
		// $pipe = chr(3);
		// $footer = chr(3) . chr(4);
		// $string = str_replace(', ', ',', $string);
		// $string = trim(preg_replace('/\s\s+/', $pipe, $string));
		// $source_string = str_replace(' ', $pipe, $string);
		// $source_string = $header . $source_string . $footer;
		// return $source_string;		
	}
}
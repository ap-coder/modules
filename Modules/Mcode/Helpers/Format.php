<?php

namespace Modules\Mcode\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Format
{
	public static function combinedSource (string $string)
	{
        \Log::info($string);

   		if (str_starts_with($string, '%01X')) {

            \Log::info("M1 CODE SCANNED: ". $string);

            do {
                // $string = str_replace("  ", " ", $this->source_string, $count);
                $string = str_replace("  ", " ", $string, $count);
            } while (
                $count > 0
            );

            // $string = implode(",", $string);

            // dump($string);
            
            // $string = [];
            /* M1 CODES */
            // $string = str_replace(',', '', $string);
            $string = str_replace('%01X', chr(1). 'X', $string);
            $string = str_replace('%1D', chr(29), $string);
            $string = str_replace('%02', chr(2), $string);
            $string = str_replace('%0f0', chr(240), $string);
            $string = str_replace('%04', chr(4), $string);	
            $string = str_replace(',', chr(44), $string);
            $string = str_replace(' ', '', $string);
	           
            $source_string = $string;

            \Log::alert($source_string);
            
            return $source_string;

        }else{

            \Log::info("M2 CODE SCANNED");

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
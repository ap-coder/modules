<?php

namespace Modules\Mcode\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait MediaUploadingTrait
{

    public function storeMedia(Request $request)
    {
        // Validates file size
        if (request()->has('size')) {
            $this->validate(request(), [
                'file' => 'max:' . request()->input('size') * 1024,
            ]);
        }
        // If width or height is preset - we are validating it as an image
        if (request()->has('width') || request()->has('height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('width', 100000),
                    request()->input('height', 100000)
                ),
            ]);
        }

        $path = storage_path('tmp/uploads');

        try {
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        } catch (\Exception $e) {
        }

        $file = $request->file('file');

        $name =  trim($file->getClientOriginalName()) . '_' . Str::random(5);      
 
        $name = strtolower($name);

        $name = str_replace(' ', '_', $name);
        $name = str_replace(['@','&','*','%','$','#'], '', $name);
        $name = str_replace(['[',']','{','}','(',')'], '', $name);
        $name = preg_replace('/--+/', '-', $name);
        $name = str_replace('-', '_', $name);

        Log::info($name);

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}

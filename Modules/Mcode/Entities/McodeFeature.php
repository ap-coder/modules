<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class McodeFeature extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'mcode_features';

    // protected $primaryKey = 'mcode';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'mcode',
        'name',
        'description',
        'source_string',
        'safe_source',
        'client_name',
        'client_description',
        'state',
        'slug',
        'template',
        'defaults',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        // static::saving(function ($model) {
        //     $model->slug = str_slug($model->name);
        // });
    }

    public function getFormattedSourceStringAttribute()
    {       
       

        if (str_starts_with($this->source_string, '%01X')) {

            Log::info("M1 CODE SCANNED");
            $string = [];
             
            do {
                $string = str_replace("  ", " ", $this->source_string, $count);
            } while (
                $count > 0
            );
            
            


            // $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            // $string = str_replace('%01X%1d%02', chr(1).'X'. chr(29) . chr(2), $this->source_string);
            $string = str_replace('%01X', chr(1). 'X', $string);
            $string = str_replace('%1D', chr(29), $string);
            $string = str_replace('%02', chr(2), $string);
            $string = str_replace('%0f0', chr(240), $string);
            $string = str_replace('%04', chr(4), $string);

$control_char = array(
 
    chr(0), chr(1), chr(2), chr(3), chr(4), chr(5), chr(6), chr(7), chr(8), chr(9), chr(10), chr(11), chr(12), chr(13), chr(14), chr(15), chr(16), chr(17), chr(18), chr(19), chr(20), chr(21), chr(22), chr(23), chr(24), chr(25), chr(26), chr(27), chr(28), chr(29), chr(30), chr(31),
);

     
            $source_string = $string;
            
            return $source_string;

        }else{

            Log::info("M1 CODE SCANNED");

            // /* M2 CODES */
            // $header = chr(1).'Y'.chr(29).chr(2);
            // $pipe = chr(3);
            // $footer = chr(3) . chr(4);
            
            // $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            // $string = str_replace(' ', $pipe, $this->source_string);
     
            // $source_string = $header . $this->source_string. $footer;
            
            // return $source_string;
       
       }


    }

    public static function last()
    {
        return static::all()->last();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function models()
    {
        return $this->belongsToMany(McodeProductModel::class);
    }

    public function categories()
    {
        return $this->belongsToMany(McodeCategory::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected static function newFactory()
    {
        return \Modules\Mcode\Database\factories\McodeFeatureFactory::new();
    }
}

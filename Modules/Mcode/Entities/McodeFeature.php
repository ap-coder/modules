<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Modules\Mcode\Entities\McodeFeature;
use Modules\Mcode\Entities\McodeCategory;


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

    // protected $casts = [
    //     'source_string' => 'string'
    // ];

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
            $source_string = $string;
            
            return $source_string;

        }else{

            Log::info("M2 CODE SCANNED");

            /* M2 CODES */
            $header = chr(1).'Y'.chr(29).chr(2);
            $pipe = chr(3);
            $footer = chr(3) . chr(4);
            
            $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            $string = str_replace(' ', $pipe, $string);
     
            $source_string = $header . $string. $footer;
            
            return $source_string;
       
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


    public function scopeM1Mcode($query)
    {
        return $query->where('mcode', 'like', 'M1%');
        // return $query->whereHas('mcode', function ($subQuery) {
        //     $subQuery->where('mcode', 'like', 'M1%');
        // });
    }

    public function scopeM2Mcode($query)
    {
        return $query->where('mcode', 'like', 'M2%');
        // return $query->whereHas('mcode', function ($subQuery) {
        //     $subQuery->where('mcode', 'like', 'M2%');
        // });
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

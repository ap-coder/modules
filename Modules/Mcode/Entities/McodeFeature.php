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

    protected $primaryKey = 'mcode';


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
       

        if (str_starts_with($this->source_string, '%01X%1d%02')) {

            Log::info("M1 CODE SCANNED");
            
            /* M1 CODES */
            $header = chr(1).'X'.chr(29).chr(2);
             
            $footer = chr(4);
            
            // $string = str_replace(', ', ',', $this->source_string);

            $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            // $string = str_replace(' ', $pipe, $this->source_string);
            $string = str_replace('%01X%1d%02', $header, $this->source_string);
            $string = str_replace('%04', $footer, $this->source_string);
     
            $source_string = $this->source_string;
            
            return $source_string;

        }else{

            Log::info("M1 CODE SCANNED");

            /* M2 CODES */
            $header = chr(1).'Y'.chr(29).chr(2);
            $pipe = chr(3);
            $footer = chr(3) . chr(4);
            
            $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            $string = str_replace(' ', $pipe, $this->source_string);
     
            $source_string = $header . $this->source_string. $footer;
            
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

    public function models()
    {
        return $this->belongsToMany(McodeProductModel::class);
    }

    public function categories()
    {
        return $this->belongsToMany(McodeCategory::class, 'mcode_category_mcode_feature', 'mcode_feature_id');
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

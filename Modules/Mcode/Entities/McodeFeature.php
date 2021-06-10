<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McodeFeature extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'mcode_features';

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
            $header = chr(1).'Y'.chr(29).chr(2);
            $pipe = chr(3);
            $footer = chr(3) . chr(4);
            
            $string = str_replace(', ', ',', $this->source_string);

            $string = trim(preg_replace('/\s\s+/', $pipe, $this->source_string));
            $string = str_replace(' ', $pipe, $this->source_string);
            $string = str_replace(',', $pipe, $this->source_string);
            $string = str_replace(', ', $pipe, $this->source_string);
     
            $source_string = $header . $this->source_string. $footer;
            
            return $source_string;
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

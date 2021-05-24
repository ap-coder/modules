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
        'template',
        'defaults',
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

    public static function last()
    {
        return static::all()->last();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function product_models()
    {
        return $this->belongsToMany(ProductModel::class);
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

<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Eloquent;
/**
 * Class McodeCategory
 * @package Modules\Mcode\Entities
 */
class McodeCategory extends Model
{
    use SoftDeletes;
    // use InteractsWithMedia;
    use HasFactory;

    public $table = 'mcode_categories';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'name',
        'description',
        'slug',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }


    public static function last()
    {
        return static::all()->last();
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('mcode')->fit('crop', 600, 600);
    }

    public function categoriesMcodeFeatures()
    {
        return $this->belongsToMany(McodeFeature::class);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->mcode     = $file->getUrl('mcode');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    protected static function newFactory()
    {
        return \Modules\Mcode\Database\factories\McodeCategoryFactory::new();
    }
}

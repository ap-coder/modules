<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class McodeProductModel extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'mcode_product_models';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'model',
        'description',
        'published',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($mcodeProductModel) {
            $mcodeProductModel->slug = Str::slug($mcodeProductModel->model);
        });
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }
	
	public static function last()
	{
		return static::all()->last();
	}
	
	public function scopePublished($query)
	{
		return $query->where('published', 1);
	}
	
    public function modelsMcodeFeatures()
    {
        return $this->belongsToMany(McodeFeature::class);
    }

    public function modelsMcodes()
    {
        return $this->belongsToMany(Mcode::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

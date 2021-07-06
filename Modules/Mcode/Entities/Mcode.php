<?php

namespace Modules\Mcode\Entities;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Mcode extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const CHICKLETS_SELECT = [
        'cc-discontinued cc-product-chiclet' => 'Discontinued',
        'cc-eol cc-product-chiclet'          => 'EOL',
    ];

	public $table = 'mcodes';


	protected $appends = [
        'photo',
    ];


	protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'published',
        'name',
        'slug',
        'desc',
        'order',
        'chicklets',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
    
	protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }


	public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('product')->fit('crop', 600, 600);
    }

	public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->preview   = $file->getUrl('product');
        }

        return $file;
    }

	protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function models()
    {
        return $this->belongsToMany(McodeProductModel::class);
    }
}

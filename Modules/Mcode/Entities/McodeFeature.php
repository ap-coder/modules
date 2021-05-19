<?php

namespace Modules\Mcode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McodeFeature extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Mcode\Database\factories\McodeFeatureFactory::new();
    }
}

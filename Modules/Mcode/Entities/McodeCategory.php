<?php

namespace Modules\Mcode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McodeCategory extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Mcode\Database\factories\McodeCategoryFactory::new();
    }
}

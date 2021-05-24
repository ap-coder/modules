<?php

namespace Modules\Mcode\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class McodeCategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

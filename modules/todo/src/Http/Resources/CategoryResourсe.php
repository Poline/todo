<?php

namespace Todo\Todo\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Todo\Todo\DTO\CategoryDTO;

/**
 * Class CategoryResource
 * @property string $id
 * @property string $name
 * @property string $deleted_at
 */
class CategoryResource extends Resource
{
    /** @mixin CategoryDTO */
    public function toArray($request)
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'deleted_at' => $this->deleted_at(),
        ];
    }
}

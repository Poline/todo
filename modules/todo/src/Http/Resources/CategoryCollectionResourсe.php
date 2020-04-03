<?php

namespace Todo\Todo\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollectionResource extends ResourceCollection
{
    public $collects = CategoryResource::class;
}

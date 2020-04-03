<?php

namespace Todo\Todo\DTO;

use Todo\Todo\Common\DTOAssembler;
use Todo\Todo\Model\Category;

abstract class CategoryDTOAssembler extends DTOAssembler
{
    /**
     * @inheritDoc
     */
    protected static function getModelClass(): string
    {
        return Category::class;
    }

    /**
     * @inheritDoc
     */
    protected static function getDtoClass(): string
    {
        return CategoryDTO::class;
    }
}

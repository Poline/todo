<?php

namespace Todo\Todo\DTO;

use Todo\Todo\Common\DTO;

class CategoryDTO extends DTO
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $deleted_at;

    public function __construct($payload)
    {
        $this->id = $payload['id']??null;
        $this->name = $payload['name']??null;
        $this->deleted_at = $payload['deleted_at']??null;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function deleted_at()
    {
        return $this->deleted_at;
    }
}

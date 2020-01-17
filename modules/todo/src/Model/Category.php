<?php

namespace Todo\Todo\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const TABLE_NAME = 'categories';
    const ID_COLUMN = 'id';
    const NAME_COLUMN = 'name';

    protected $primaryKey = self::ID_COLUMN;

    protected $casts = [
        self::ID_COLUMN => 'string',
        self::NAME_COLUMN => 'string',
    ];

    protected $fillable = [
        self::ID_COLUMN,
        self::NAME_COLUMN
    ];


}

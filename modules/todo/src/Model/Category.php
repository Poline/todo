<?php

namespace Todo\Todo\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Todo\Todo\Traits\UseUUID;

class Category extends Model
{
    use UseUUID;
    use SoftDeletes;

    const TABLE_NAME = 'categories';
    const ID_COLUMN = 'id';
    const NAME_COLUMN = 'name';
    const DELETED_AT_COLUMN = 'deleted_at';

    protected $keyType = 'string';
    protected $primaryKey = self::ID_COLUMN;

    protected $casts = [
        self::ID_COLUMN => 'string',
        self::NAME_COLUMN => 'string',
    ];

    protected $fillable = [
        self::ID_COLUMN,
        self::NAME_COLUMN,
    ];
}

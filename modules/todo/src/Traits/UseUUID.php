<?php

namespace Todo\Todo\Traits;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

trait UseUUID
{
    /**
     *  Init model
     */
    protected function initializeUseUUID()
    {
        if ($this instanceof Model) {
            // disable autoincrement, it works only for int
            $this->setIncrementing(false);
            // set type for primary key to have correct workable relation
            $this->setKeyType('string');
        }
    }

    /**
     * Boot model with UUID primary
     */
    protected static function bootUseUUID()
    {
        static::creating(function (Model $model) {
            // in case if we want to set our own UUID
            if ($model->{$model->getKeyName()} === null) {
                $model->{$model->getKeyName()} = Uuid::generate()->string;
            } else {
                return Uuid::import($model->{$model->getKeyName()})->string;
            }
        });
    }
}

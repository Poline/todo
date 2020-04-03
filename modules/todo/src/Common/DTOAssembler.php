<?php

namespace Todo\Todo\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

abstract class DTOAssembler
{
    /**
     * @return string
     */
    abstract protected static function getDtoClass(): string;

    /**
     * @return string
     */
    abstract protected static function getModelClass(): string;

    /**
     * @param Model $model
     * @return DTO
     * @throws \Exception
     */
    public static function fromEloquentModel(Model $model)
    {
        $modelClass = static::getModelClass();

        if (!$model instanceof $modelClass) {
            throw new \Exception('Invalid model class in assembler');
        }

        return static::fromArray($model->toArray());
    }

    /**
     * @return array
     */
    public static function getAssemblers(): array
    {
        return [
            'createdAt' => [
                'isCollection' => false,
                'class' => Carbon::class
            ],
            'updatedAt' => [
                'isCollection' => false,
                'class' => Carbon::class
            ],
        ];
    }

    /**
     * @param array $payload
     * @return DTO
     */
    public static function fromArray(array $payload)
    {
        $dtoClass = static::getDtoClass();
        $payloadCamel = [];

        foreach ($payload as $key => $value) {
            if (mb_strpos($key, '_')) {
                $key = Str::camel($key);
            }
            $payloadCamel[$key] = $value;
        }

        return new $dtoClass(static::assemblePayload($payloadCamel));
    }

    /**
     * @param array $payload
     * @return array
     */
    public static function assemblePayload(array $payload): array
    {
        foreach (static::getAssemblers() as $key => $assembler) {
            if (Arr::has($payload, $key)) {
                $value = Arr::get($payload, $key);

                if ($assembler['isCollection'] && is_array($value)) {
                    $collection = collect();

                    foreach ($value as $enum => $item) {
                        $collection->put($enum,
                            static::assembleValue($item, $assembler['class'])
                        );
                    }

                    $value = $collection;
                } else {
                    $value = static::assembleValue($value, $assembler['class']);
                }

                Arr::set($payload, $key, $value);
            }
        }

        return $payload;
    }

    /**
     * @param $value
     * @param string|null $class
     * @return mixed
     */
    private static function assembleValue($value, ?string $class)
    {
        if ($value !== null && $class !== null && !($value instanceof Dto)) {
            // Specially for Carbon::parse
            if (method_exists($class, 'parse')) {
                return $class::parse($value);
            }
            if (method_exists($class, 'fromPayload')) {
                return $class::fromPayload($value);
            }
            if (method_exists($class, 'fromArray')) {
                return $class::fromArray($value);
            }
        }

        return $value;
    }
}

<?php

namespace Mathleite\PhpArch\api\common;

abstract class AbstractModel
{
    /**
     * Define which property will be filled
     * @var array
     */
    protected array $fillables = [];

    public function __construct(array $properties)
    {
        $this->fill($properties);
    }

    private function fill(array $properties): void
    {
        /**
         * @var mixed $property
         * @var mixed $propertyValue
         */
        foreach ($properties as $property => $propertyValue)
        {
            if (
                !property_exists(static::class, $property)
                || !$this->isFillable($property)
            ) {
                continue;
            }

            $this->$property = $propertyValue;
        }
    }

    private function isFillable(string $propertyName): bool
    {
        return in_array($propertyName, $this->fillables);
    }

    public function toArray(bool $onlyFillables = false): array
    {
        $properties = get_object_vars($this);
        if (!empty($properties['fillables'])) {
            unset($properties['fillables']);
        }

        $data = [];
        foreach (array_keys($properties) as $property) {
            if ($onlyFillables && !$this->isFillable($property)) {
                continue;
            }
            $data[$property] = $this->$property;
        }
        return $data;
    }
}
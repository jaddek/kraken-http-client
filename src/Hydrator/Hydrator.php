<?php

declare(strict_types=1);

namespace Jaddek\Kraken\Http\Client\Hydrator;

use ReflectionClass;
use ReflectionNamedType;

class Hydrator
{
    protected array $levels = [];

    /**
     * @param class-string $class
     * @param array<mixed, mixed> $data
     * @throws \ReflectionException
     * @throws HydratorException
     */
    public static function instance(array $data, string $class): Item|Collection
    {
        $reflection = new ReflectionClass($class);

        $instance = new self();
        $instance->associate($reflection);

        $result = $instance->hydrate($data, $reflection);

        if (!$result instanceof $class) {
            throw new HydratorException('Hydration failed');
        }

        return $result;
    }

    /**
     * @param array<mixed, mixed> $data
     * @throws HydratorException
     */
    private function hydrate(array $data, ReflectionClass $reflection): Item|Collection
    {
        $class = $reflection->getName();

        return match ($this->matchSubclass($reflection)) {
            Collection::class => $this->hydrateCollection($data, $class),
            Item::class => $this->hydrateItem($data, $class),
            default => throw new HydratorException('Unexpected subclass'),
        };
    }

    /**
     * @param class-string $class
     * @param array<mixed, mixed> $data
     * @throws HydratorException
     */
    private function hydrateCollection(array $data, string $class): Collection
    {
        $collection = new $class();

        foreach ($data as $array) {
            foreach ($array as $key => &$value) {
                if (is_object($value)) {
                    $value = (array)$value;
                }

                if (is_array($value) && isset($this->levels[$key])) {
                    $value = $this->hydrateCollection($value, $this->levels[$key]);
                }
            }

            $item = $this->hydrateItem($array, $collection::getSupportedItem());
            $collection->add($item);
        }

        if (!$collection instanceof Collection) {
            throw new HydratorException(sprintf('Collection class should be inherited from %s', Collection::class));
        }

        return $collection;
    }

    /**
     *
     * @param class-string $class
     * @param array<mixed, mixed> $data
     * @throws \ReflectionException
     * @throws HydratorException
     *
     * @psalm-suppress LessSpecificReturnStatement
     */
    private function hydrateItem(array $data, string $class): Item
    {
        foreach ($data as $key => &$value) {
            if (!is_array($value) || !isset($this->levels[$key])) {
                continue;
            }

            $value = $this->hydrateCollection($value, $this->levels[$key]);
        }

        $newArray              = [];
        $reflection            = new ReflectionClass($class);
        $constructor           = $reflection->getConstructor();
        $constructorParameters = $constructor ? $constructor->getParameters() : [];

        foreach ($constructorParameters as $parameter) {
            $parameterValue = $data[$parameter->getName()] ?? null;

            if ($parameterValue === null) {
                $newArray[$parameter->getName()] = $parameterValue;

                continue;
            }

            $parameterType = $parameter->getType();

            if (!$parameterType instanceof ReflectionNamedType) {
                throw new HydratorException('Hydrator supports only ReflectionNamedType implementation');
            }

            if (!$parameterType->isBuiltin() && !$parameterValue instanceof Collection) {
                $newArray[$parameter->getName()] = $this->hydrateItem(
                    $parameterValue,
                    $parameterType->getName(),
                );

                continue;
            }

            $valueType  = $this->getType($parameterValue);
            $paramType  = $parameterType->getName();
            $isNullable = $parameterType->allowsNull();

            if (($valueType === 'NULL' && !$isNullable) && ($valueType !== $paramType)) {
                throw new HydratorException(
                    sprintf(
                        'Different types. An attribute <%s> expecting %s, got %s',
                        $parameter->getName(),
                        $paramType,
                        $this->getType($parameterValue),
                    )
                );
            }

            $newArray[$parameter->getName()] = $parameterValue;
        }

        $instance = new $class(...array_values($newArray));

        if (!$instance instanceof Item) {
            throw new HydratorException('Invalid instance');
        }

        return $instance;
    }

    private function matchSubclass(ReflectionClass $reflection): string
    {
        return match (true) {
            $reflection->isSubclassOf(Collection::class) => Collection::class,
            $reflection->isSubclassOf(Item::class) => Item::class,
            default => throw new HydratorException(sprintf(
                'Unexpected %s subclass. Expecting %s or %s',
                $reflection->getName(),
                Collection::class,
                Item::class,
            )),
        };
    }

    private function associate(ReflectionClass $reflection): void
    {
        match ($this->matchSubclass($reflection)) {
            Collection::class => $this->associateCollection($reflection),
            Item::class => $this->associateItem($reflection),
            default => throw new HydratorException('Unexpected subclass'),
        };
    }

    private function associateCollection(ReflectionClass $reflection): void
    {
        /** @var Collection $class */
        $class = $reflection->getName();
        /** @var class-string $item */
        $supportedItem = $class::getSupportedItem();
        $itemKey       = $class::getItemsKey();

        $this->levels[$itemKey] = $class;

        if (class_exists($supportedItem) === false) {
            throw new \RuntimeException(sprintf('Class %s not exists', $supportedItem));
        }

        $this->associate(new ReflectionClass($supportedItem));
    }

    /**
     * @throws \ReflectionException
     * @throws HydratorException
     */
    private function associateItem(ReflectionClass $reflection): void
    {
        foreach ($reflection->getProperties() as $property) {
            $type = $property->getType();

            if (!($type instanceof ReflectionNamedType) || $type->isBuiltin() !== false) {
                continue;
            }

            /** @var class-string $item */
            $item = $type->getName();

            if (class_exists($item) === false) {
                throw new \RuntimeException(sprintf('Class %s not exists', $item));
            }

            $this->associate(new ReflectionClass($item));
        }
    }

    private function getType(mixed $value): string
    {
        $type = gettype($value);

        return match ($type) {
            'double' => 'float',
            'integer' => 'int',
            default => $type,
        };
    }
}

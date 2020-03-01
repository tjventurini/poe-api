<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class ItemProperty extends DTO
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var int
     */
    public int $display_mode;

    /**
     * @var null|int
     */
    public ?int $type;

    /**
     * @var array
     */
    public array $values;
}
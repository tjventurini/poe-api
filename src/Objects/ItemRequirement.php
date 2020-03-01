<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class ItemRequirement extends DTO
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var array
     */
    public array $values;

    /**
     * @var int
     */
    public int $display_mode;
}
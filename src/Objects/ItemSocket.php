<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class ItemSocket extends DTO
{
    /**
     * @var int
     */
    public int $group;

    /**
     * @var string
     */
    public string $attribute;

    /**
     * @var string
     */
    public string $color;
}
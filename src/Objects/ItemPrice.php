<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class ItemPrice extends DTO
{
    /**
     * @var float
     */
    public float $quantity;

    /**
     * @var bool
     */
    public bool $fixed;

    /**
     * @var string
     */
    public string $currency;
    // TODO: convert currency to object
}
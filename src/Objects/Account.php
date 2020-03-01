<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class Account extends DTO
{
    /**
     * @var string
     */
    public ?string $account_name;

    /**
     * @var null|string
     */
    public ?string $last_character_name;
}
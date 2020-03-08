<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class Stash extends DTO
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var bool
     */
    public bool $public;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $league;

    /**
     * @var \Tjventurini\PoeApi\Objects\Account
     */
    public Account $account;

    /**
     * @var \Tjventurini\PoeApi\Objects\Item[]
     */
    public array $items;
}
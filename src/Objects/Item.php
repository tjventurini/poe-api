<?php

namespace Tjventurini\PoeApi\Objects;

use Tjventurini\DTO\DTO;

class Item extends DTO
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $line;

    /**
     * @var bool
     */
    public bool $verified;

    /**
     * @var bool
     */
    public bool $identified;

    /**
     * @var \Tjventurini\PoeApi\Objects\ItemPosition
     */
    public ItemPosition $position;

    /**
     * @var string
     */
    public string $icon;

    /**
     * @var \Tjventurini\PoeApi\Objects\ItemSocket[]
     */
    public array $sockets;

    /**
     * @var \Tjventurini\PoeApi\Objects\ItemDimension
     */
    public ItemDimension $dimension;

    /**
     * @var string
     */
    public string $league;

    /**
     * @var string
     */
    public string $type_line;

    /**
     * @var int
     */
    public int $item_level;

    /**
     * @var string
     */
    public string $flavour_text;

    /**
     * @var string
     */
    public string $category;

    /**
     * @var array
     */
    public array $subcategories;

    /**
     * @var \Tjventurini\PoeApi\Objects\ItemProperty[]
     */
    public array $properties;

    /**
     * @var null|\Tjventurini\PoeApi\Objects\ItemPrice
     */
    public ?ItemPrice $price;

    /**
     * @var \Tjventurini\PoeApi\Objects\ItemRequirement[]
     */
    public array $requirements;

    /**
     * @var array
     */
    public array $explicit_mods;
}
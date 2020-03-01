<?php

namespace Tjventurini\PoeApi\Converters;

use Tjventurini\PoeApi\Objects\Item;
use Tjventurini\PoeApi\Objects\ItemPrice;
use Tjventurini\PoeApi\Objects\ItemSocket;
use Tjventurini\PoeApi\Objects\ItemProperty;
use Tjventurini\PoeApi\Objects\ItemPosition;
use Tjventurini\PoeApi\Objects\ItemDimension;
use Tjventurini\PoeApi\Objects\ItemRequirement;

class ItemConverter extends Converter
{
    /**
     * Convert stash items to Item objects.
     *
     * @param array $stash
     *
     * @return array
     */
    public static function convert(array $stash): array
    {
        return collect($stash['items'])
            ->map(function ($item) {
                return new Item([
                    'id'            => $item['id'],
                    'name'          => $item['name'],
                    'verified'      => $item['verified'],
                    'position'      => new ItemPosition([
                        'x' => $item['x'],
                        'y' => $item['y'],
                    ]),
                    'dimension'     => new ItemDimension([
                        'w' => $item['w'],
                        'h' => $item['h'],
                    ]),
                    'icon'          => $item['icon'],
                    'sockets'       => self::convertSockets($item),
                    'league'        => $item['league'],
                    'type_line'     => $item['typeLine'],
                    'identified'    => $item['identified'],
                    'item_level'    => $item['ilvl'],
                    'flavour_text'  => implode("", $item['flavourText'] ?? []),
                    'category'      => $item['extended']['category'],
                    'subcategories' => $item['extended']['subcategories'] ?? [],
                    'properties'    => self::convertProperties($item),
                    'price'         => self::convertPrice($item),
                    'requirements'  => self::convertRequirements($item),
                    'explicit_mods' => $item['explicitMods'] ?? [],
                ]);
            })
            ->toArray();
    }

    /**
     * @param array $item
     *
     * @return null|\Tjventurini\PoeApi\Objects\ItemPrice
     * @throws \Exception
     */
    protected static function convertPrice(array $item): ?ItemPrice
    {
        // check if the argument exists
        if (!isset($item['note'])) {
            return null;
        }

        // explode string to elements
        $elements = explode(' ', $item['note']);

        // check if we have a fixed price
        $fixed = false;
        if ($elements[0] == '~price') {
            $fixed = true;
        }

        // get the quantity
        $quantity = (float) $elements[1] ?? 0;

        // extract currency
        $currency = $elements[2] ?? null;

        // return object
        return new ItemPrice([
            'quantity' => $quantity,
            'fixed'    => $fixed,
            'currency' => $currency,
        ]);
    }

    /**
     * Convert properties of the item to ItemProperty objects.
     *
     * @return ItemProperty[]
     */
    protected static function convertProperties(array $item): array
    {
        return collect($item['properties'] ?? [])
            ->map(function ($property) {
                return new ItemProperty([
                    'name'         => $property['name'],
                    'values'       => $property['values'],
                    'display_mode' => $property['displayMode'],
                    'type'         => $property['type'] ?? null,
                ]);
            })
            ->toArray();
    }

    /**
     * Convert item sockets to ItemSocket objects.
     *
     * @param array $item
     *
     * @return ItemSocket[]
     */
    protected static function convertSockets(array $item): array
    {
        return collect($item['sockets'] ?? [])
            ->map(function ($socket) {
                $color = null;
                if ($socket['sColour'] == 'R') {
                    $color = 'red';
                } else if ($socket['sColour'] == 'B') {
                    $color = 'blue';
                } else if ($socket['sColour'] == 'W') {
                    $color = 'white';
                } else if ($socket['sColour'] == 'G') {
                    $color = 'green';
                } else {
                    ddi('color not found: ' . $socket['sColour']);
                }

                return new ItemSocket([
                    'group'     => $socket['group'],
                    'attribute' => $socket['attr'],
                    'color'     => $color,
                ]);
            })
            ->toArray();
    }

    /**
     * @param array $item
     *
     * @return ItemRequirement[]
     */
    private static function convertRequirements(array $item): array
    {
        return collect($item['requirements'] ?? [])
            ->map(function ($requirement) {
                return new ItemRequirement([
                    'name'         => $requirement['name'],
                    'values'       => $requirement['values'],
                    'display_mode' => $requirement['displayMode'],
                ]);
            })
            ->toArray();
    }
}
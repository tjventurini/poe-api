<?php

namespace Tjventurini\PoeApi\Converters;

use Tjventurini\PoeApi\Objects\Stash;
use Tjventurini\PoeApi\Objects\Account;

class StashConverter extends Converter
{
    /**
     * Convert data to Stash object.
     *
     * @param array $stashes
     *
     * @return \Tjventurini\PoeApi\Objects\Stash[]
     */
    public static function convert(array $stashes): array
    {
        return collect($stashes)
            ->filter(function ($stash) {
                return $stash['public'];
            })
            ->filter(function ($stash) {
                return ($stash['accountName']);
            })
            ->map(function ($stash) {
                // convert stash to Stash object
                // - convert stash account
                // - convert stash items
                $Account = self::convertAccount($stash);

                $items = ItemConverter::convert($stash);

                return new Stash([
                    'id'      => $stash['id'],
                    'public'  => $stash['public'],
                    'name'    => $stash['name'] ?? null,
                    'league'  => $stash['league'],
                    'account' => $Account,
                    'items'   => $items,
                ]);
            })
            ->toArray();
    }

    /**
     * Convert stash account to Account object.
     *
     * @param array $stash
     *
     * @return \Tjventurini\PoeApi\Objects\Account
     * @throws \Exception
     */
    protected static function convertAccount(array $stash): Account
    {
        return new Account([
            'account_name'        => $stash['accountName'],
            'last_character_name' => $stash['lastCharacterName'],
        ]);
    }
}
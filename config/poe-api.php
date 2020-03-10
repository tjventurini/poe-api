<?php

/*
 |--------------------------------------------------------------------------
 | Tjventurini\PoeApi Package Configuration
 |--------------------------------------------------------------------------
 |
 | Configuration file of the Tjventurini\PoeApi package.
 |
 */

return [

    /*
     |--------------------------------------------------------------------------
     | API URL
     |--------------------------------------------------------------------------
     |
     | The URL of the Path of Exile API.
     |
     */

    'api_url' => 'http://api.pathofexile.com',

    /*
     |--------------------------------------------------------------------------
     | Stashes URL
     |--------------------------------------------------------------------------
     |
     | The stashes url of the Path of Exile API.
     |
     */

    'stashes_url' => '/public-stash-tabs',

    /*
     |--------------------------------------------------------------------------
     | Stashes next_change_id Key
     |--------------------------------------------------------------------------
     |
     | The stashes_next_change_id_key is used to save the next_change_id from
     | the stashes api so we know which id to fetch next if no specific id
     | is given.
     |
     */

    'stashes_next_change_id_key' => 'stashes_next_change_id',

    /*
     |--------------------------------------------------------------------------
     | Stashes first next_change_id
     |--------------------------------------------------------------------------
     |
     | Since we don't want to fetch all the change IDs that PoE has to offer, we
     | provide a next_change_id value to start with. If you want to disable this
     | behaviour, then just replace the string with `null`.
     |
     */

    'stashes_first_next_change_id' => '614399983-631083253-599354019-675230649-646732006',

];
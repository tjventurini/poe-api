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

];
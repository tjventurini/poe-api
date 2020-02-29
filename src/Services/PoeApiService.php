<?php

namespace Tjventurini\PoeApi\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class PoeApiService
{
    /**
     * @var string
     */
    private string $app_url;

    /**
     * @var \GuzzleHttp\Client
     */
    private Client $client;

    /**
     * @var string
     */
    private string $stashes_url;

    /**
     * PoeApi constructor.
     *
     * @param string $app_url
     * @param string $stashes_url
     */
    public function __construct(string $app_url, string $stashes_url)
    {
        $this->app_url = $app_url;
        $this->stashes_url = $stashes_url;
        $this->client = new Client([
            'base_url' => $this->app_url,
        ]);
    }

    /**
     * Return collection of stashes.
     */
    public function stashes(): Collection
    {
        ddi($this->client);
    }
}
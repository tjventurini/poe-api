<?php

namespace Tjventurini\PoeApi\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Tjventurini\PoeApi\Converters\StashConverter;

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
            'base_uri' => $this->app_url,
        ]);
    }

    /**
     * Returns decoded response as array.
     *
     * @param string $method
     * @param string $uri
     * @param array  $params
     *
     * @return array
     */
    private function request(string $method, string $uri, array $params = []): array
    {
        $response = $this->client->request($method, $uri, $params)
            ->getBody()
            ->getContents();

        return json_decode($response, 1);
    }

    /**
     * Return collection of stashes.
     *
     * @param string|null $id
     *
     * @return array
     */
    public function stashes(?string $next_change_id = null): array
    {
        // get last next_change_id from cache
        // if there is none passed
        $next_change_id = $next_change_id ?? Cache::get(config('poe-api.stashes_next_change_id_key'), null);

        // create request params
        $params = [
            'query' => [
                'id' => $next_change_id,
            ],
        ];

        // make request to api
        $response = $this->request('GET', $this->stashes_url, $params);

        // extract stashes
        $stashes = $response['stashes'];

        // persist last stash id
        Cache::put(config('poe-api.stashes_next_change_id_key'), $response['next_change_id']);

        // convert stashes into Stash objects and return
        return StashConverter::convert($stashes);
    }
}
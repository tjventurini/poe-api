<?php

namespace Tjventurini\PoeApi\Services;

use GuzzleHttp\Client;
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
    public function stashes(?string $id = null): array
    {
        // make request to api
        $stashes = $this->request('GET', $this->stashes_url, [
            'id' => $id,
        ]);

        // TODO: persist last stash id

        // convert stashes into Stash objects and return
        return StashConverter::convert($stashes);
    }
}
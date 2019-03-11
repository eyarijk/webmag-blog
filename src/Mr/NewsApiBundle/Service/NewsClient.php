<?php

namespace App\Mr\NewsApiBundle\Service;

class NewsClient
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $url;

    public const BASE_URL = 'https://newsapi.org/';

    public const VERSION = 2;

    /**
     * NewsClient constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->url = static::BASE_URL . 'v' . static::VERSION . '/';
    }

    /**
     * @param string $query
     * @return array
     */
    public function getByQuery(string $query): array
    {
        // :TODO
    }

    private function makeRequest()
    {
        // :TODO
    }
}

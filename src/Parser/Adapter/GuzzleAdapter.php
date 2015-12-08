<?php

namespace ImageParser\Parser\Adapter;

use GuzzleHttp\Client;
use ImageParser\Parser\ParserInterface;
/**
 * Description of GuzzleAdapter
 *
 * @author Oleksandr Shmyheliuk
 */
class GuzzleAdapter implements ParserInterface
{
    private $client;

    public function __construct(Client $client = null)
    {
        if ($client == null && class_exists('\GuzzleHttp\Client')) {
            $client = new Client([
                'timeout'  => 10.0,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36',
                ]
            ]);
        }
        $this->client = $client;
    }

    public function parseUrl($url)
    {
        $response = $this->client->request('GET', $url);
        return $response->getBody()->getContents();
    }
}
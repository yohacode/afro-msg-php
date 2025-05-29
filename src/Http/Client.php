<?php

namespace App\Http;

use App\Http\Contracts\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class Client implements ClientInterface
{
    protected GuzzleClient $httpClient;
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim($_ENV['AFROMSG_BASE_URL'] ?? 'https://api.afromessage.com', '/');
        $this->apiKey = $_ENV['AFROMSG_API_KEY'] ?? '';

        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => "Bearer {$this->apiKey}",
                'Accept'        => 'application/json',
            ]
        ]);
    }

    public function get(string $endpoint, array $query = []): array
    {
        try {
            $response = $this->httpClient->request('GET', $endpoint, [
                'query' => $query
            ]);

            return json_decode($response->getBody()->getContents(), true) ?? [];
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function post(string $endpoint, array $data = []): array
    {
        try {
            $response = $this->httpClient->request('POST', $endpoint, [
                'json' => $data
            ]);

            return json_decode($response->getBody()->getContents(), true) ?? [];
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

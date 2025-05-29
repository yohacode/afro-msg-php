<?php

namespace App\Http;

// File: src/Http/Client.php
namespace App\Http;

use App\Http\Contracts\ClientInterface;

class Client implements ClientInterface {
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct() {
        $this->baseUrl = $_ENV['AFROMSG_BASE_URL'];
        $this->apiKey = $_ENV['AFROMSG_API_KEY'];
    }

    public function get(string $endpoint, array $query = []): array {
        // Simulated GET request logic
        return ['status' => 'success', 'endpoint' => $endpoint, 'query' => $query];
    }

    public function post(string $endpoint, array $data = []): array {
        // Simulated POST request logic
        return ['status' => 'success', 'endpoint' => $endpoint, 'data' => $data];
    }
}

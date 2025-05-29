<?php 

namespace App\Contracts;

namespace App\Http\Contracts;

interface ClientInterface {
    public function get(string $endpoint, array $query = []): array;
    public function post(string $endpoint, array $data = []): array;
}
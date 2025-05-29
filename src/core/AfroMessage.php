<?php

// File: src/Core/AfroMessage.php
namespace App\Core;

use App\Contracts\AfroMessageInterface;
use App\Http\Client;

class AfroMessage implements AfroMessageInterface {
    protected Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function sendSms(string $to, string $message, ?string $senderId = null): array {
        return $this->client->post('/send', [
            'to' => $to,
            'message' => $message,
            'senderId' => $senderId ?? $_ENV['AFROMSG_SENDER_ID'],
        ]);
    }

    public function checkBalance(): array {
        return $this->client->get('/balance');
    }

    public function getDeliveryReport(string $messageId): array {
        return $this->client->get("/delivery-report/{$messageId}");
    }
}
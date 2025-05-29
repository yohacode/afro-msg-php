<?php

namespace App\Core;

use App\Core\Contracts\AfroMessageInterface;
use App\Http\Contracts\ClientInterface;

class AfroMessage implements AfroMessageInterface
{
    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function sendSmsGet(string $to, string $message, ?string $senderId = null): array
    {
        $query = [
            'to' => $to,
            'message' => $message,
        ];
        if ($senderId) {
            $query['sender_id'] = $senderId;
        }
        return $this->client->get('/api/v1/sms/send', $query);
    }

    public function sendSmsPost(string $to, string $message, ?string $senderId = null): array
    {
        $payload = [
            'to' => $to,
            'message' => $message,
        ];
        if ($senderId) {
            $payload['sender_id'] = $senderId;
        }
        return $this->client->post('/api/v1/sms/send', $payload);
    }

    public function sendBulkSms(array $recipients, string $message, ?string $senderId = null): array
    {
        $payload = [
            'recipients' => implode(',', $recipients),
            'message' => $message,
        ];
        if ($senderId) {
            $payload['sender_id'] = $senderId;
        }
        return $this->client->post('/api/v1/sms/bulk', $payload);
    }

    public function sendSecurityCode(string $phoneNumber): array
    {
        return $this->client->post('/api/v1/sms/security-code/send', [
            'phone' => $phoneNumber
        ]);
    }

    public function verifyCode(string $phoneNumber, string $code): array
    {
        return $this->client->post('/api/v1/sms/security-code/verify', [
            'phone' => $phoneNumber,
            'code' => $code
        ]);
    }

    public function checkBalance(): array
    {
        return $this->client->get('/api/v1/account/balance');
    }

    public function getDeliveryReport(string $messageId): array
    {
        return $this->client->get("/api/v1/sms/status/{$messageId}");
    }
}
<?php

namespace App\Core\Contracts;

interface AfroMessageInterface
{
    public function sendSmsGet(string $to, string $message, ?string $senderId = null): array;

    public function sendSmsPost(string $to, string $message, ?string $senderId = null): array;

    public function sendBulkSms(array $recipients, string $message, ?string $senderId = null): array;

    public function sendSecurityCode(string $phoneNumber): array;

    public function verifyCode(string $phoneNumber, string $code): array;

    public function checkBalance(): array;

    public function getDeliveryReport(string $messageId): array;
}

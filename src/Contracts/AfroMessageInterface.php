<?php

namespace App\Contracts;

interface AfroMessageInterface {
    public function sendSms(string $to, string $message, ?string $senderId = null): array;
    public function checkBalance(): array;
    public function getDeliveryReport(string $messageId): array;
}
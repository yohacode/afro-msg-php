<?php

// 

if (!function_exists('env_init'))
{
    function env_init($path = __DIR__ . '/../../')
    {
        $dotenv = Dotenv\Dotenv::createImmutable($path);
        $dotenv->load();
    }
}
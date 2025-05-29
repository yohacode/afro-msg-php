<?php

/**
 * Afro Message Application Container
 */
namespace App\Contracts;

interface AppContainerInterface
{
    /**
     * 
     */
    public function getInstances(): void;
    public function getSerialize(): void;
}
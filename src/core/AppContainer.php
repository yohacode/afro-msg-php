<?php

/**
 * AfroMsg class app container
 */

namespace App\core;

use App\Contracts\AppContainerInterface;


class AppContainer implements AppContainerInterface
{
    public function getInstances(): void
    {
        $n =  12;
    }
}
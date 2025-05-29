<?php


class T 
{
    private static $instance = null;
    private function __construct(){}
    public function __clone(){}

    public static function getInstance(): static
    {
        if (self::$instance == null)
        {
            self::$instance = new static();
        }
        return self::$instance;
    }

}

var_dump(T::getInstance());
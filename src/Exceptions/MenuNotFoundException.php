<?php

namespace Kaishiyoku\LaravelMenu\Exceptions;

class MenuNotFoundException extends \Exception
{
    public function __construct(string $name, $code = 0, \Throwable $previous = null)
    {
        $message = "Menu '{$name}' not found.";

        parent::__construct($message, $code, $previous);
    }
}

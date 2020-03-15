<?php

namespace Kaishiyoku\LaravelMenu\Exceptions;

class MenuExistsException extends \Exception
{
    public function __construct(string $name, $code = 0, \Throwable $previous = null)
    {
        $message = "Menu '{$name}' already exists.";

        parent::__construct($message, $code, $previous);
    }
}

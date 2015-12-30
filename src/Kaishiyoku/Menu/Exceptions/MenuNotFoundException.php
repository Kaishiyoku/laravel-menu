<?php namespace Kaishiyoku\Menu\Exceptions;

use Exception;

class MenuNotFoundException extends Exception
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Constructor.
     *
     * @param string        $name
     * @param int           $code
     * @param Exception $previous
     */
    public function __construct($name, $code = 0, Exception $previous = null)
    {
        $this->name = $name;

        parent::__construct('Menu not found: ' . $this->getName(), $code, $previous);
    }

    /**
     * Get the menu name which was not found.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

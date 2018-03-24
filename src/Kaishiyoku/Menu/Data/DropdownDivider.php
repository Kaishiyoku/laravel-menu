<?php

namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;
use Kaishiyoku\Menu\MenuHelper;

class DropdownDivider extends MenuEntry implements Renderable
{
    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param bool $isVisible
     */
    public function __construct($isVisible = true)
    {
        $this->isVisible = $isVisible;
    }


    /**
     * Get the evaluated contents of the object.
     *
     * @param null|array $customAttributes
     * @return null
     */
    public function render($customAttributes = null)
    {
        if (MenuHelper::getConfig()->getCustomDropdownDividerRenderFunction() != null) {
            return MenuHelper::getConfig()->getCustomDropdownDividerRenderFunction()();
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}

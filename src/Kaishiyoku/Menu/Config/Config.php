<?php

namespace Kaishiyoku\Menu\Config;

use Kaishiyoku\Menu\Data\MenuEntry;

class Config
{
    const BOOTSTRAP_4 = 'bootstrap4';

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $listElementClasses = [];

    /**
     * @var array
     */
    private $anchorElementClasses = [];

    /**
     * @var array
     */
    private $dropdownItemClasses = [];

    /**
     * @var null|callable
     */
    private $customDropdownContainerRenderFunction = null;

    /**
     * @var null|callable
     */
    private $customDropdownItemRenderFunction = null;

    /**
     * @var null|callable
     */
    private $customDropdownDividerRenderFunction = null;

    /***
     * @var null|callable
     */
    private $customDropdownHeaderRenderFunction = null;

    public static function forBootstrap4()
    {
        $config = new Config();
        $config->name = 'bootstrap4';

        $config->setListElementClasses(['nav-item']);
        $config->setAnchorElementClasses(['nav-link']);
        $config->setDropdownItemClasses(['dropdown-item']);

        // custom render functions
        $config->setCustomDropdownContainerRenderFunction(function ($link, $output, $additionalClasses = null) use ($config) {
            $classes = 'dropdown-menu ' . $additionalClasses;

            return $link . '<div class="' . $classes . '">' . $output . '</div>';
        });
        $config->setCustomDropdownItemRenderFunction(function (MenuEntry $entry, $isActive) use ($config) {
            $classes = $config->getDropdownItemClasses();

            if ($isActive) {
                $classes[] = 'active';
            }

            return $entry->render(['class' => implode(' ', $classes)]);
        });
        $config->setCustomDropdownDividerRenderFunction(function () {
            return '<div class="dropdown-divider"></div>';
        });
        $config->setCustomDropdownHeaderRenderFunction(function ($title) {
            return '<h6 class="dropdown-header">' . $title . '</h6>';
        });

        return $config;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getListElementClasses()
    {
        return $this->listElementClasses;
    }

    /**
     * @param array $listElementClasses
     */
    public function setListElementClasses($listElementClasses)
    {
        $this->listElementClasses = $listElementClasses;
    }

    /**
     * @return array
     */
    public function getAnchorElementClasses()
    {
        return $this->anchorElementClasses;
    }

    /**
     * @param array $anchorElementClasses
     */
    public function setAnchorElementClasses($anchorElementClasses)
    {
        $this->anchorElementClasses = $anchorElementClasses;
    }

    /**
     * @return array
     */
    public function getDropdownItemClasses()
    {
        return $this->dropdownItemClasses;
    }

    /**
     * @param array $dropdownItemClasses
     */
    public function setDropdownItemClasses($dropdownItemClasses)
    {
        $this->dropdownItemClasses = $dropdownItemClasses;
    }

    /**
     * @return callable
     */
    public function getCustomDropdownItemRenderFunction()
    {
        return $this->customDropdownItemRenderFunction;
    }

    /**
     * @return callable
     */
    public function getCustomDropdownContainerRenderFunction()
    {
        return $this->customDropdownContainerRenderFunction;
    }

    /**
     * @param callable $customDropdownContainerRenderFunction
     */
    public function setCustomDropdownContainerRenderFunction($customDropdownContainerRenderFunction)
    {
        $this->customDropdownContainerRenderFunction = $customDropdownContainerRenderFunction;
    }

    /**
     * @param callable $customDropdownItemRenderFunction
     */
    public function setCustomDropdownItemRenderFunction($customDropdownItemRenderFunction)
    {
        $this->customDropdownItemRenderFunction = $customDropdownItemRenderFunction;
    }

    /**
     * @return callable|null
     */
    public function getCustomDropdownDividerRenderFunction()
    {
        return $this->customDropdownDividerRenderFunction;
    }

    /**
     * @param callable|null $customDropdownDividerRenderFunction
     */
    public function setCustomDropdownDividerRenderFunction($customDropdownDividerRenderFunction)
    {
        $this->customDropdownDividerRenderFunction = $customDropdownDividerRenderFunction;
    }

    /**
     * @return callable|null
     */
    public function getCustomDropdownHeaderRenderFunction()
    {
        return $this->customDropdownHeaderRenderFunction;
    }

    /**
     * @param callable|null $customDropdownHeaderRenderFunction
     */
    public function setCustomDropdownHeaderRenderFunction($customDropdownHeaderRenderFunction)
    {
        $this->customDropdownHeaderRenderFunction = $customDropdownHeaderRenderFunction;
    }
}

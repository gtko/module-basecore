<?php

namespace Modules\BaseCore\Entities;

use ArrayAccess;

class MenuItem implements ArrayAccess
{
    /**
     * @param string $title
     * @param string $icon
     * @param string $route_name
     * @param string $icon_sup
     * @param string $route_sup
     * @param string $count
     * @param string $link_count
     * @param array<MenuItem> $sub_menu
     */
    public function __construct(
        public string $title,
        public string $icon = '',
        public string $route_name = '',
        public string $icon_sup = '',
        public string $route_sup = '',
        public array  $sub_menu = [],
        public string $count = '',
        public string $link_count = '',

    )
    {
    }

    public static function hydrate(array $menuItemArray): MenuItem
    {
        return new self(
            $menuItemArray['title'] ?? '',
            $menuItemArray['icon'] ?? '',
            $menuItemArray['route_name'] ?? '',
            $menuItemArray['icon_sup'] ?? '',
            $menuItemArray['route_sup'] ?? '',
            $menuItemArray['sub_menu'] ?? [],
            $menuItemArray['count'] ?? '',
            $menuItemArray['link_count'] ?? '',
        );
    }

    public function offsetExists($offset): bool
    {
        return !empty($this->{$offset} ?? '');
    }

    public function offsetGet($offset)
    {
        return $this->{$offset} ?? '';
    }

    public function offsetSet($offset, $value)
    {
        return $this->{$offset} = $value ?? '';
    }

    public function offsetUnset($offset)
    {
        return $this->{$offset} = null;
    }
}

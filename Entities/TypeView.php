<?php

namespace Modules\BaseCore\Entities;

class TypeView
{

    const TYPE_BLADE_VIEW = 'blade-view';
    const TYPE_BLADE_COMPONENT = 'blade-component';
    const TYPE_LIVEWIRE = 'livewire';
    const TYPE_HTML = 'html';


    public function __construct(
        protected string $typeView = self::TYPE_BLADE_VIEW,
        protected string $content = ''
    ){}

    public function setBladeView(string $path): void
    {
        $this->typeView = self::TYPE_BLADE_VIEW;
    }

    public function setBladeComponent(string $path): void
    {
        $this->typeView = self::TYPE_BLADE_COMPONENT;
    }

    public function setLiveWire(string $path): void
    {
        $this->typeView = self::TYPE_LIVEWIRE;
    }

    public function setHtml(string $path): void
    {
        $this->typeView = self::TYPE_HTML;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function hasType(string $type): bool
    {
        return $this->typeView === $type;
    }

    public function hasBladeViewType(): bool
    {
        return $this->typeView === self::TYPE_BLADE_VIEW;
    }

    public function hasBladeComponentType(): bool
    {
        return $this->typeView === self::TYPE_BLADE_COMPONENT;
    }

    public function hasLiveWireType(): bool
    {
        return $this->typeView === self::TYPE_LIVEWIRE;
    }

    public function hasHTMLType(): bool
    {
        return $this->typeView === self::TYPE_HTML;
    }

    public function isEmpty():bool
    {
        return empty($this->content);
    }

}

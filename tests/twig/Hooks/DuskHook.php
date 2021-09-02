<?php

namespace Braunstetter\TemplateHooks\Test\twig\Hooks;

use Braunstetter\TemplateHooks\Twig\TemplateHook;

class DuskHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return 'hook should not show up';
    }

    public function setTarget(): string|array
    {
        return 'dusk';
    }

}
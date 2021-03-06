<?php

namespace Braunstetter\TemplateHooks\Test\twig\Hooks;

use Braunstetter\TemplateHooks\Twig\TemplateHook;

class TestHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return 'hook works';
    }

    public function setTarget(): string|array
    {
        return 'test';
    }

}